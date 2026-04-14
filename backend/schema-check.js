require('dotenv').config();
const { Client } = require('pg');
async function run() {
  const c = new Client({connectionString: process.env.DATABASE_URL});
  await c.connect();
  
  const res = await c.query(`
    SELECT column_name, data_type, is_nullable 
    FROM information_schema.columns 
    WHERE table_name = 'dukaan_list' 
    ORDER BY ordinal_position
  `);
  
  require('fs').writeFileSync('schema_out.txt', res.rows.map(r => `${r.column_name} (${r.data_type})`).join('\n'));
  console.log('Done. See schema_out.txt');
  await c.end();
}
run();
