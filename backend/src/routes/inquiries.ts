import { Router, Request, Response } from 'express';
import { query } from '../db';

const router = Router();

/**
 * POST /api/inquiries
 * Submit a new business inquiry (Get Best Price)
 */
router.post('/', async (req: Request, res: Response) => {
  try {
    const { 
      shop_id, 
      name, 
      business_name, 
      phone_number, 
      category, 
      interested_product, 
      description 
    } = req.body;

    if (!shop_id || !name || !phone_number) {
      res.status(400).json({ success: false, message: 'Shop ID, Name, and Phone Number are required' });
      return;
    }

    const result = await query(
      `INSERT INTO inquiries (
        shop_id, name, business_name, phone_number, category, interested_product, description
      ) VALUES (?, ?, ?, ?, ?, ?, ?)`,
      [shop_id, name, business_name, phone_number, category, interested_product, description]
    );

    res.status(201).json({
      success: true,
      message: 'Inquiry submitted successfully',
      data: { id: result.insertId }
    });
  } catch (err) {
    console.error('Inquiry submission error:', err);
    res.status(500).json({ success: false, message: 'Server error during inquiry submission' });
  }
});

/**
 * GET /api/inquiries
 * View all inquiries (Admin only - though we might add protect/adminOnly middleware later)
 */
router.get('/', async (_req: Request, res: Response) => {
  try {
    const result = await query(
      `SELECT i.*, d.dukaan_name as shop_name 
       FROM inquiries i 
       JOIN dukaan_list d ON i.shop_id = d.id 
       ORDER BY i.created_at DESC`
    );
    res.json({ success: true, data: result.rows });
  } catch (err) {
    console.error(err);
    res.status(500).json({ success: false, message: 'Server error' });
  }
});

export default router;
