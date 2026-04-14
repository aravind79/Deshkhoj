const fs = require('fs');
const archiver = require('archiver');
const output = fs.createWriteStream(__dirname + '/DeshKhoj_LINUX_PROD.zip');
const archive = archiver('zip', { zlib: { level: 9 }});

output.on('close', function() {
  console.log('Archive final size: ' + archive.pointer() + ' total bytes');
  console.log('ZIP READY FOR HOSTINGER!');
});

archive.on('error', function(err) {
  throw err;
});

archive.pipe(output);

// Add everything from deploy_final
archive.directory('deploy_final/', false);

archive.finalize();
