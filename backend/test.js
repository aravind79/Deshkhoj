const { Client } = require('pg');
async function test() {
  const pws = ['admin', 'postgres', 'root', 'password', ''];
  for (const p of pws) {
    try {
      const client = new Client({connectionString: `postgresql://postgres:${p}@localhost:5432/deshkhoj`});
      await client.connect();
      console.log('SUCCESS:', p);
      await client.end();
      return;
    } catch(e) {
      console.log('FAILED:', p, e.message);
    }
  }
}
test();
