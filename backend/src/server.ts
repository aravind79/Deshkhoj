import express from 'express';
import cors from 'cors';
import helmet from 'helmet';
import dotenv from 'dotenv';
import path from 'path';
import fs from 'fs';
import rateLimit from 'express-rate-limit';

import { errorHandler } from './middleware/errorHandler';
import authRoutes from './routes/auth';
import businessRoutes from './routes/businesses';
import locationRoutes from './routes/locations';
import categoryRoutes from './routes/categories';
import productRoutes from './routes/products';
import adminRoutes from './routes/admin';
import inquiriesRoutes from './routes/inquiries';
import messagesRoutes from './routes/messages';

dotenv.config();

const app = express();

// --- Security & Rate Limiting ---
app.use(helmet());
// app.use(
//   rateLimit({
//     windowMs: 15 * 60 * 1000, // 15 minutes
//     max: 200,
//     standardHeaders: true,
//     legacyHeaders: false,
//   })
// );

// --- CORS ---
// app.options('*', cors({ origin: '*' })); // Express 5 compatibility fix
app.use(
  cors({
    origin: '*',
    methods: ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
    allowedHeaders: ['Content-Type', 'Authorization'],
    credentials: false,
  })
);

// --- Body Parsing ---
app.use(express.json({ limit: '10mb' }));
app.use(express.urlencoded({ extended: true, limit: '10mb' }));

// --- Upload Directories ---
const uploadDirs = ['./uploads', './uploads/csv'];
uploadDirs.forEach((dir) => {
  if (!fs.existsSync(dir)) fs.mkdirSync(dir, { recursive: true });
});

// --- Static Files (Uploads) ---
app.use('/uploads', express.static(path.resolve('./uploads')));

// --- Health Check ---
app.get('/api/health', (_req, res) => {
  res.json({ success: true, message: 'DeshKhoj API is running', timestamp: new Date() });
});

// --- Routes ---
app.use('/api/auth', authRoutes);
app.use('/api/businesses', businessRoutes);
app.use('/api/locations', locationRoutes);
app.use('/api/categories', categoryRoutes);
app.use('/api/products', productRoutes);
app.use('/api/admin', adminRoutes);
app.use('/api/inquiries', inquiriesRoutes);
app.use('/api/messages', messagesRoutes);

// --- Static Frontend (Production Only) ---
const frontendPath = path.resolve(__dirname, '../public');
if (fs.existsSync(frontendPath)) {
  app.use(express.static(frontendPath));
  app.get('*', (req: express.Request, res: express.Response) => {
    if (!req.path.startsWith('/api')) {
      res.sendFile(path.join(frontendPath, 'index.html'));
    } else {
      res.status(404).json({ success: false, message: 'API Route not found' });
    }
  });
} else {
  // --- 404 Handler ---
  app.use((_req, res) => {
    res.status(404).json({ success: false, message: 'Route not found' });
  });
}

// --- Error Handler ---
app.use(errorHandler);

const PORT = parseInt(process.env.PORT || '5000', 10);
app.listen(PORT, () => {
  console.log(`\n🚀 DeshKhoj Backend running on http://localhost:${PORT}`);
  console.log(`   Environment: ${process.env.NODE_ENV || 'development'}`);
  console.log(`   Health:      http://localhost:${PORT}/api/health\n`);
});


export default app;
