require('dotenv').config();
const { Client } = require('pg');
async function run() {
  const c = new Client({connectionString: process.env.DATABASE_URL});
  await c.connect();
  const res = await c.query("SELECT id, username, password FROM user_list WHERE role = 'admin'");
  console.log(res.rows);
  await c.query("UPDATE dukaan_list SET status = 'active' WHERE status IS NULL");
  await c.end();
}
run();
