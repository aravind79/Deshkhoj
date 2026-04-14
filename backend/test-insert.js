require('dotenv').config();
const { Client } = require('pg');
async function run() {
  const c = new Client({connectionString: process.env.DATABASE_URL});
  await c.connect();
  
  try {
    const result = await c.query(`
      INSERT INTO dukaan_list (
        user_id, dukaan_name, dukaan_addr, dukaandar_name, contact_no, whatsapp, pincode, block_id,
        dukaan_desc, email, shop_categories, category_1, category_2, category_3,
        business_type, gst_no, payment_modes, main_photo, gallery, 
        years_established, video_name, audio_name, dukaan_img_id, paid, status
      )
      VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13,$14,$15,$16,$17,$18,$19,$20,$21,$22,$23,$24,$25)
      RETURNING id`,
      [1, 'Test Shop', '123 MG Road', 'Ram Lal', '9876543210', '9876543210', '221001', null,
       'Test desc', 'test@test.com', 'Grocery', 'Grocery', '', '',
       'Retailer', '', 'Cash', '', '',
       0, '', '', 1, 0, 'pending']
    );
    console.log('SUCCESS! ID:', result.rows[0].id);
  } catch(e) {
    console.error('ERROR:', e.message);
  }
  
  await c.end();
}
run();
