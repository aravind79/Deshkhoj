"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const express_1 = require("express");
const db_1 = require("../db");
const multer_1 = __importDefault(require("multer"));
const path_1 = __importDefault(require("path"));
const router = (0, express_1.Router)();
// Configure Multer for image uploads
const storage = multer_1.default.diskStorage({
    destination: (_req, _file, cb) => cb(null, './uploads/'),
    filename: (_req, file, cb) => {
        const uniqueSuffix = Date.now() + '-' + Math.round(Math.random() * 1e9);
        cb(null, 'biz-' + uniqueSuffix + path_1.default.extname(file.originalname));
    },
});
const upload = (0, multer_1.default)({ storage });
/**
 * POST /api/businesses/upload
 * Returns filename of uploaded business photo
 */
router.post('/upload', upload.single('image'), (req, res) => {
    if (!req.file) {
        res.status(400).json({ success: false, message: 'No file uploaded' });
        return;
    }
    const protocol = req.headers['x-forwarded-proto'] || req.protocol;
    const host = req.headers['x-forwarded-host'] || req.get('host');
    const fileUrl = `${protocol}://${host}/uploads/${req.file.filename}`;
    res.json({ success: true, filename: req.file.filename, url: fileUrl });
});
/**
 * GET /api/businesses/stats
 * Public stats for home page
 */
router.get('/stats', async (_req, res) => {
    try {
        const [totalBusiness, activeBusiness, users, pending, products, states, districts] = await Promise.all([
            (0, db_1.query)("SELECT COUNT(*) as count FROM dukaan_list WHERE dukaan_name != 'Sample Shop Name'"),
            (0, db_1.query)("SELECT COUNT(*) as count FROM dukaan_list d WHERE d.paid = 1"),
            (0, db_1.query)("SELECT COUNT(*) as count FROM user_list"),
            (0, db_1.query)("SELECT COUNT(*) as count FROM dukaan_list WHERE paid = 0"),
            (0, db_1.query)("SELECT COUNT(*) as count FROM dukaan_products WHERE is_del = 0"),
            (0, db_1.query)("SELECT COUNT(*) as count FROM states"),
            (0, db_1.query)("SELECT COUNT(*) as count FROM districts"),
        ]);
        res.json({
            success: true,
            data: {
                totalBusinesses: parseInt(totalBusiness.rows[0]?.count || '0'),
                activeBusinesses: parseInt(activeBusiness.rows[0]?.count || '0'),
                users: parseInt(users.rows[0]?.count || '0'),
                pending: parseInt(pending.rows[0]?.count || '0'),
                products: parseInt(products.rows[0]?.count || '0'),
                states: parseInt(states.rows[0]?.count || '0'),
                towns: parseInt(districts.rows[0]?.count || '0'),
            }
        });
    }
    catch (err) {
        console.error(err);
        res.status(500).json({ success: false, message: 'Server error' });
    }
});
/**
 * GET /api/businesses
 * Search and filter businesses
 */
router.get('/', async (req, res) => {
    try {
        const { q, loc, category, state_id, district_id, block_id, village_id, page = '1', limit = '12', } = req.query;
        const offset = (parseInt(page) - 1) * parseInt(limit);
        // PUBLIC SEARCH: Show all valid businesses (filter out blank/bad records)
        const conditions = [`(d.dukaan_name IS NOT NULL AND d.dukaan_name != '' AND d.dukaan_name != '.')`];
        const params = [];

        if (q) {
            const qSpaceless = q.replace(/\s+/g, '');
            const qTerm = `%${q}%`;
            const qSpTerm = `%${qSpaceless}%`;
            // Super search: match name, description, address, category names, AND individual product names
            let qCondition = `(
        d.dukaan_name LIKE ? OR REPLACE(d.dukaan_name, ' ', '') LIKE ? OR 
        d.dukaan_desc LIKE ? OR REPLACE(d.dukaan_desc, ' ', '') LIKE ? OR 
        d.dukaan_addr LIKE ? OR REPLACE(d.dukaan_addr, ' ', '') LIKE ? OR 
        d.shop_categories LIKE ? OR REPLACE(d.shop_categories, ' ', '') LIKE ? OR 
        d.category_1 LIKE ? OR REPLACE(d.category_1, ' ', '') LIKE ? OR 
        d.category_2 LIKE ? OR REPLACE(d.category_2, ' ', '') LIKE ? OR 
        d.category_3 LIKE ? OR REPLACE(d.category_3, ' ', '') LIKE ? OR 
        EXISTS (SELECT 1 FROM dukaan_products dp WHERE dp.shop_id = d.id AND (dp.prod_name LIKE ? OR REPLACE(dp.prod_name, ' ', '') LIKE ?))
      )`;
            const qParams = [
                qTerm, qSpTerm,
                qTerm, qSpTerm,
                qTerm, qSpTerm,
                qTerm, qSpTerm,
                qTerm, qSpTerm,
                qTerm, qSpTerm,
                qTerm, qSpTerm,
                qTerm, qSpTerm
            ];
            conditions.push(qCondition);
            params.push(...qParams);
        }
        if (loc) {
            conditions.push(`d.dukaan_addr LIKE ?`);
            params.push(`%${loc}%`);
        }
        if (category) {
            const searchTerm = category.trim();
            const searchSpaceless = searchTerm.replace(/\s+/g, '');
            const searchParts = searchTerm.split(/[\/\s-]+/).filter(t => t.length > 2);
            // Basic conditions for the full term
            const catTerm = `%${searchTerm}%`;
            const catSpTerm = `%${searchSpaceless}%`;
            let catConditionParts = [
                `d.shop_categories LIKE ?`, `REPLACE(d.shop_categories, ' ', '') LIKE ?`,
                `d.category_1 LIKE ?`, `REPLACE(d.category_1, ' ', '') LIKE ?`,
                `d.category_2 LIKE ?`, `REPLACE(d.category_2, ' ', '') LIKE ?`,
                `d.category_3 LIKE ?`, `REPLACE(d.category_3, ' ', '') LIKE ?`,
                `d.dukaan_name LIKE ?`, `REPLACE(d.dukaan_name, ' ', '') LIKE ?`,
                `d.dukaan_desc LIKE ?`, `REPLACE(d.dukaan_desc, ' ', '') LIKE ?`
            ];
            const catParams = [
                catTerm, catSpTerm,
                catTerm, catSpTerm,
                catTerm, catSpTerm,
                catTerm, catSpTerm,
                catTerm, catSpTerm,
                catTerm, catSpTerm
            ];
            searchParts.forEach(part => {
                const partTerm = `%${part}%`;
                catConditionParts.push(`d.shop_categories LIKE ?`, `d.category_1 LIKE ?`, `d.category_2 LIKE ?`, `d.category_3 LIKE ?`, `d.dukaan_name LIKE ?`, `d.dukaan_desc LIKE ?`);
                catParams.push(partTerm, partTerm, partTerm, partTerm, partTerm, partTerm);
            });
            conditions.push(`(${catConditionParts.join(' OR ')})`);
            params.push(...catParams);
        }
        if (state_id) {
            conditions.push(`s.id = ?`);
            params.push(state_id);
        }
        if (district_id) {
            conditions.push(`dst.id = ?`);
            params.push(district_id);
        }
        if (block_id) {
            conditions.push(`b.id = ?`);
            params.push(block_id);
        }
        if (village_id) {
            conditions.push(`d.village_id = ?`);
            params.push(village_id);
        }
        const joinClause = `
          LEFT JOIN user_list u ON d.user_id = u.id
          LEFT JOIN blocks b ON u.block_id = b.id
          LEFT JOIN districts dst ON b.district_id = dst.id
          LEFT JOIN states s ON dst.state_id = s.id
        `;
        const whereClause = `WHERE ${conditions.join(' AND ')}`;
        // Get Total Count
        const countResult = await (0, db_1.query)(`SELECT COUNT(*) as count FROM dukaan_list d ${joinClause} ${whereClause}`, params);
        const total = parseInt(countResult.rows[0]?.count || '0');
        // Get Results - map legacy photos to main_photo
        const queryParams = [...params, parseInt(limit), offset];
        const result = await (0, db_1.query)(`SELECT d.*,
               COALESCE(NULLIF(d.main_photo, ''), (SELECT photo_name FROM dukaan_photos WHERE id = d.dukaan_img_id LIMIT 1)) as main_photo
               FROM dukaan_list d 
               ${joinClause}
               ${whereClause} 
               ORDER BY d.id DESC 
               LIMIT ? OFFSET ?`, queryParams);
        res.json({
            success: true,
            data: result.rows,
            meta: {
                total,
                page: parseInt(page),
                limit: parseInt(limit),
                totalPages: Math.ceil(total / parseInt(limit)),
            },
        });
    }
    catch (err) {
        console.error('BUSINESSES ROUTE ERROR:', err.message);
        res.status(500).json({ success: false, message: 'Server error', detail: err.message });
    }
});
/**
 * GET /api/businesses/:id
 * Returns single business with products and photos
 */
router.get('/:id', async (req, res) => {
    try {
        // Fetch business details without the subqueries to avoid crashing if reviews table is missing
        const dukaanResult = await (0, db_1.query)(`SELECT d.*,
              COALESCE(NULLIF(TRIM(d.main_photo), ''), (SELECT NULLIF(TRIM(photo_name), '') FROM dukaan_photos WHERE id = d.dukaan_img_id LIMIT 1), 'sample.jpg') as main_photo
       FROM dukaan_list d
       WHERE d.id = ?`, [req.params.id]);
        if (!dukaanResult.rows.length) {
            res.status(404).json({ success: false, message: 'Business not found' });
            return;
        }
        const photosResult = await (0, db_1.query)('SELECT id, photo_name, prod_id FROM dukaan_photos WHERE prod_id IS NULL AND id IN (SELECT dukaan_img_id FROM dukaan_list WHERE id = ?)', [req.params.id]);
        const productsResult = await (0, db_1.query)('SELECT id, prod_name, prod_desc, prod_detailed_desc, prod_amt, cat_id, quantity, unit FROM dukaan_products WHERE shop_id = ? AND is_del = 0', [req.params.id]);
        // Try to fetch reviews, but don't crash if it fails
        let avg_rating = 0;
        let review_count = 0;
        try {
            const reviewsResult = await (0, db_1.query)('SELECT CAST(COALESCE(AVG(rating), 0) AS DECIMAL(10,2)) as avg_rating, COUNT(*) as review_count FROM dukaan_reviews WHERE shop_id = ?', [req.params.id]);
            if (reviewsResult.rows.length > 0) {
                avg_rating = reviewsResult.rows[0].avg_rating;
                review_count = reviewsResult.rows[0].review_count;
            }
        }
        catch (e) {
            console.warn("Could not fetch reviews (table might be missing)", e);
        }
        res.json({
            success: true,
            data: {
                ...dukaanResult.rows[0],
                avg_rating,
                review_count,
                photos: photosResult.rows,
                products: productsResult.rows,
            },
        });
    }
    catch (err) {
        console.error(err);
        res.status(500).json({ success: false, message: 'Server error', detail: err.message, stack: err.stack });
    }
});
/**
 * POST /api/businesses
 * Register a new business with products
 */
router.post('/', async (req, res) => {
    try {
        const { dukaan_name, dukaan_addr, dukaandar_name, contact_no, whatsapp, pincode, block_id, dukaan_desc, email, shop_categories, category_1, category_2, category_3, business_type, gst_no, payment_modes, main_photo, gallery, years_established = 0, products = [], user_id = 1 } = req.body;
        const result = await (0, db_1.query)(`INSERT INTO dukaan_list (
        user_id, dukaan_name, dukaan_addr, dukaandar_name, contact_no, whatsapp, pincode,
        dukaan_desc, email, shop_categories, category_1, category_2, category_3,
        business_type, gst_no, payment_modes, main_photo, gallery, 
        years_established, video_name, audio_name, dukaan_img_id, paid, status
      )
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '', '', 1, 0, 'pending')`, [
            user_id, dukaan_name, dukaan_addr, dukaandar_name, contact_no, whatsapp, pincode,
            dukaan_desc, email, shop_categories, category_1 || shop_categories, category_2 || '', category_3 || '',
            business_type, gst_no, payment_modes, main_photo, gallery, years_established
        ]);
        const businessId = result.insertId;
        // Smart Categorization: Find cat_id from product_category
        let catId = 1; // Default
        try {
            const catSearch = await (0, db_1.query)("SELECT id FROM product_category WHERE category_name LIKE ? OR loc_category_name LIKE ? LIMIT 1", [`%${shop_categories || category_1}%`, `%${shop_categories || category_1}%`]);
            if (catSearch.rows.length)
                catId = catSearch.rows[0].id;
        }
        catch (e) {
            console.error("Category lookup failed", e);
        }
        // Insert Products
        if (products && Array.isArray(products) && products.length > 0) {
            for (const prod of products) {
                await (0, db_1.query)(`INSERT INTO dukaan_products (prod_name, prod_desc, prod_amt, shop_id, is_del, cat_id, quantity, unit)
           VALUES (?, ?, ?, ?, 0, ?, 1, 'pcs')`, [prod.name || prod.prod_name, prod.description || prod.prod_desc || '', prod.price || prod.prod_amt || '0', businessId, catId]);
            }
        }
        res.status(201).json({
            success: true,
            message: 'Business and products submitted for review',
            data: { id: businessId },
        });
    }
    catch (err) {
        console.error("Registration error:", err);
        res.status(500).json({ success: false, message: 'Server error during registration' });
    }
});
/**
 * GET /api/businesses/:id/reviews
 */
router.get('/:id/reviews', async (req, res) => {
    try {
        const result = await (0, db_1.query)("SELECT * FROM dukaan_reviews WHERE shop_id = ? ORDER BY created_at DESC", [req.params.id]);
        res.json({ success: true, data: result.rows });
    }
    catch (err) {
        console.error(err);
        // Return empty array instead of 500 error if table is missing
        res.json({ success: true, data: [] });
    }
});
/**
 * POST /api/businesses/:id/reviews
 */
router.post('/:id/reviews', async (req, res) => {
    try {
        const { user_name, rating, comment } = req.body;
        if (!user_name || !rating) {
            res.status(400).json({ success: false, message: 'Name and rating are required' });
            return;
        }
        await (0, db_1.query)("INSERT INTO dukaan_reviews (shop_id, user_name, rating, comment) VALUES (?, ?, ?, ?)", [req.params.id, user_name, rating, comment]);
        res.status(201).json({ success: true, message: 'Review added successfully' });
    }
    catch (err) {
        console.error(err);
        res.status(500).json({ success: false, message: 'Server error' });
    }
});
exports.default = router;
//# sourceMappingURL=businesses.js.map