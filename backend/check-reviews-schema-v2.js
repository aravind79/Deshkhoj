require('dotenv').config();
const { Client } = require('pg');
async function run() {
  const c = new Client({connectionString: process.env.DATABASE_URL});
  await c.connect();
  const res = await c.query("SELECT column_name, data_type FROM information_schema.columns WHERE table_name = 'dukaan_reviews'");
  console.log('Columns in dukaan_reviews:', res.rows);
  await c.end();
}
run();
