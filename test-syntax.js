const fs = require('fs');
const content = fs.readFileSync('backend/dist/routes/businesses.js', 'utf8');
try {
  new Function(content);
  console.log('Syntax OK');
} catch (e) {
  console.log('Syntax Error:', e);
}
