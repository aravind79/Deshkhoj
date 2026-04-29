const fs = require('fs');
const path = require('path');
const archiver = require('archiver');

const output = fs.createWriteStream(path.join(__dirname, 'PRE_MIGRATION_BACKUP.zip'));
const archive = archiver('zip', { zlib: { level: 9 } });

output.on('close', function () {
  console.log('✅ Backup Complete!');
  console.log('Total size: ' + (archive.pointer() / 1024 / 1024).toFixed(2) + ' MB');
  console.log('File saved as: PRE_MIGRATION_BACKUP.zip');
});

archive.on('error', function (err) {
  throw err;
});

archive.pipe(output);

// Files and Folders to include (Root)
const items = fs.readdirSync(__dirname);
items.forEach(item => {
  const fullPath = path.join(__dirname, item);
  const isDirectory = fs.lstatSync(fullPath).isDirectory();

  // Exclude heavy/redundant folders
  if (item === 'node_modules' || item === '.git' || item === '.next' || item === 'PRE_MIGRATION_BACKUP.zip' || item === 'dist') {
    return;
  }

  if (isDirectory) {
    archive.directory(item + '/', item);
  } else {
    archive.file(fullPath, { name: item });
  }
});

// Specifically handle nested node_modules to be sure they are ignored
archive.finalize();
