const express = require('express');
const next = require('next');
const path = require('path');
const fs = require('fs');

// 1. Initialise Next.js
const dev = process.env.NODE_ENV !== 'production';
const frontendDir = __dirname;
const app = next({ 
  dev, 
  dir: frontendDir
});
const handle = app.getRequestHandler();

// 2. Import Express Backend
// Note: We point to the compiled dist folder
const backendApp = require('./backend/dist/server').default;

app.prepare().then(() => {
  const server = express();

  // Use the Backend API routes
  // The backend already handles /api/*
  server.use(backendApp);

  // All other requests go to Next.js
  server.all(/.*/, (req, res) => {
    return handle(req, res);
  });

  const PORT = process.env.PORT || 3000;
  server.listen(PORT, (err) => {
    if (err) throw err;
    console.log(`\n🚀 DeshKhoj UNIFIED SERVER running on port ${PORT}`);
    console.log(`   API:     http://localhost:${PORT}/api/health`);
    console.log(`   Website: http://localhost:${PORT}\n`);
  });
}).catch(err => {
  console.error('Unified Server Error:', err);
  process.exit(1);
});
