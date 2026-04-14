require('dotenv').config();
const { Client } = require('pg');
async function run() {
  const c = new Client({connectionString: process.env.DATABASE_URL});
  await c.connect();
  
  // Check dukaan_reviews columns
  const res = await c.query(`
    SELECT column_name, data_type FROM information_schema.columns 
    WHERE table_name = 'dukaan_reviews' ORDER BY ordinal_position
  `);
  console.log('dukaan_reviews:', res.rows.map(r => r.column_name).join(', '));
  
  // Add created_at if missing
  await c.query("ALTER TABLE dukaan_reviews ADD COLUMN IF NOT EXISTS created_at TIMESTAMP DEFAULT NOW()");
  console.log('created_at ensured');
  
  await c.end();
}
run();
