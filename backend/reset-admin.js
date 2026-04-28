const bcrypt = require('bcryptjs');
const mysql = require('mysql2/promise');

// ── DB Credentials (Hostinger) ────────────────────────────────────────────────
const DB_HOST = '127.0.0.1';
const DB_USER = 'u519989786_admn_deshkhoj2';
const DB_PASS = '3cCrV?fKp/0';
const DB_NAME = 'u519989786_deshkhoj2';

const NEW_PASSWORD = 'Dk_2k25';

async function run() {
  const hash = await bcrypt.hash(NEW_PASSWORD, 12);
  console.log('Generated hash:', hash);

  const conn = await mysql.createConnection({
    host: DB_HOST,
    user: DB_USER,
    password: DB_PASS,
    database: DB_NAME,
  });

  const [result] = await conn.execute(
    `UPDATE user_list SET password = ?, status = 'active' WHERE username = 'admin'`,
    [hash]
  );

  console.log(`✅ Admin password updated. Rows affected: ${result.affectedRows}`);
  await conn.end();
}

run().catch(console.error);
