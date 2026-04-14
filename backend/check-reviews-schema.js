require('dotenv').config();
const { Client } = require('pg');
async function run() {
  const c = new Client({connectionString: process.env.DATABASE_URL});
  await c.connect();
  const res = await c.query("SELECT column_name FROM information_schema.columns WHERE table_name = 'dukaan_reviews'");
  console.log('Columns in dukaan_reviews:', res.rows.map(r => r.column_name));
  await c.end();
}
run();
