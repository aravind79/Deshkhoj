require('dotenv').config();
const { Client } = require('pg');
async function run() {
  const c = new Client({connectionString: process.env.DATABASE_URL});
  await c.connect();
  
  const alterStatements = [
    "ALTER TABLE dukaan_list ADD COLUMN IF NOT EXISTS whatsapp TEXT DEFAULT ''",
    "ALTER TABLE dukaan_list ADD COLUMN IF NOT EXISTS pincode TEXT DEFAULT ''",
    "ALTER TABLE dukaan_list ADD COLUMN IF NOT EXISTS block_id INTEGER",
    "ALTER TABLE dukaan_list ADD COLUMN IF NOT EXISTS category_1 TEXT DEFAULT ''",
    "ALTER TABLE dukaan_list ADD COLUMN IF NOT EXISTS category_2 TEXT DEFAULT ''",
    "ALTER TABLE dukaan_list ADD COLUMN IF NOT EXISTS category_3 TEXT DEFAULT ''",
    "ALTER TABLE dukaan_list ADD COLUMN IF NOT EXISTS business_type TEXT DEFAULT 'Retailer'",
    "ALTER TABLE dukaan_list ADD COLUMN IF NOT EXISTS gst_no TEXT DEFAULT ''",
    "ALTER TABLE dukaan_list ADD COLUMN IF NOT EXISTS payment_modes TEXT DEFAULT 'Cash'",
    "ALTER TABLE dukaan_list ADD COLUMN IF NOT EXISTS main_photo TEXT DEFAULT ''",
    "ALTER TABLE dukaan_list ADD COLUMN IF NOT EXISTS gallery TEXT DEFAULT ''",
    "ALTER TABLE dukaan_list ADD COLUMN IF NOT EXISTS years_established INTEGER DEFAULT 0",
    "ALTER TABLE dukaan_list ADD COLUMN IF NOT EXISTS created_at TIMESTAMP DEFAULT NOW()",
  ];
  
  for (const sql of alterStatements) {
    await c.query(sql);
    console.log('OK:', sql.substring(0, 60));
  }
  
  // Also check dukaan_products schema
  const res = await c.query(`
    SELECT column_name FROM information_schema.columns 
    WHERE table_name = 'dukaan_products' ORDER BY ordinal_position
  `);
  console.log('\ndukaan_products columns:', res.rows.map(r => r.column_name).join(', '));
  
  await c.end();
  console.log('\nAll columns added!');
}
run();
