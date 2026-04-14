require('dotenv').config();
const { Client } = require('pg');
const fs = require('fs');

async function run() {
  const c = new Client({connectionString: process.env.DATABASE_URL});
  await c.connect();

  let sql = "-- DeshKhoj Full Production Migration\nSET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';\nSET FOREIGN_KEY_CHECKS = 0;\n\n";

  const tables = [
    'states', 'districts', 'blocks', 'villages', 
    'product_category', 'measure_unit', 
    'user_list', 'dukaan_list', 'dukaan_products', 'dukaan_reviews', 'dukaan_photos'
  ];

  for (const table of tables) {
    console.log(`Exporting ${table}...`);
    const res = await c.query(`SELECT * FROM ${table}`);
    if (res.rows.length === 0) continue;

    sql += `-- Data for ${table}\n`;
    const cols = Object.keys(res.rows[0]);
    
    // Wrap column names in backticks to handle reserved keywords like 'order'
    const quotedCols = cols.map(c => `\`${c}\``).join(', ');

    for (const row of res.rows) {
      const vals = cols.map(col => {
        const v = row[col];
        if (v === null || v === undefined) return 'NULL';
        if (v instanceof Date) return `'${v.toISOString().slice(0, 19).replace('T', ' ')}'`;
        if (typeof v === 'string') return `'${v.replace(/'/g, "''")}'`;
        if (typeof v === 'boolean') return v ? 1 : 0;
        return v;
      }).join(', ');
      
      sql += `INSERT INTO ${table} (${quotedCols}) VALUES (${vals}) ON DUPLICATE KEY UPDATE \`id\`=\`id\`;\n`;
    }
    sql += "\n";
  }

  sql += "SET FOREIGN_KEY_CHECKS = 1;\n";
  fs.writeFileSync('production_migration.sql', sql);
  console.log('production_migration.sql regenerated successfully with backticks.');
  await c.end();
}
run().catch(console.error);
