const mysql = require('mysql2/promise');
require('dotenv').config();

async function test() {
  console.log('Testing with URL:', process.env.DATABASE_URL.replace(/:.*@/, ':****@'));
  try {
    const conn = await mysql.createConnection(process.env.DATABASE_URL);
    console.log('✅ DATABASE CONNECTION SUCCESSFUL!');
    const [rows] = await conn.execute('SELECT COUNT(*) as count FROM dukaan_list');
    console.log('✅ DATA FOUND:', rows[0].count, 'businesses.');
    await conn.end();
  } catch (err) {
    console.error('❌ CONNECTION FAILED:');
    console.error(err.message);
  }
}

test();
