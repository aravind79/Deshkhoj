const { query } = require('./dist/db');
require('dotenv').config();

async function setup() {
  try {
    const isMySQL = process.env.DATABASE_URL?.startsWith('mysql://') || process.env.DB_TYPE === 'mysql';
    
    let createTableSQL = '';
    
    if (isMySQL) {
      createTableSQL = `
        CREATE TABLE IF NOT EXISTS inquiries (
          id INT AUTO_INCREMENT PRIMARY KEY,
          shop_id INT,
          name VARCHAR(255),
          business_name VARCHAR(255),
          phone_number VARCHAR(20),
          category VARCHAR(100),
          interested_product VARCHAR(255),
          description TEXT,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          FOREIGN KEY (shop_id) REFERENCES dukaan_list(id)
        )
      `;
    } else {
      createTableSQL = `
        CREATE TABLE IF NOT EXISTS inquiries (
          id SERIAL PRIMARY KEY,
          shop_id INTEGER REFERENCES dukaan_list(id),
          name TEXT,
          business_name TEXT,
          phone_number TEXT,
          category TEXT,
          interested_product TEXT,
          description TEXT,
          created_at TIMESTAMPTZ DEFAULT NOW()
        )
      `;
    }

    console.log('Creating inquiries table...');
    await query(createTableSQL);
    console.log('Success!');
    process.exit(0);
  } catch (err) {
    console.error('Error creating table:', err);
    process.exit(1);
  }
}

setup();
