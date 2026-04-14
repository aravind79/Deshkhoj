const nodemailer = require('nodemailer');
require('dotenv').config();

const transporter = nodemailer.createTransport({
  host: process.env.SMTP_HOST,
  port: parseInt(process.env.SMTP_PORT || '465'),
  secure: true,
  auth: {
    user: process.env.SMTP_USER,
    pass: process.env.SMTP_PASS,
  },
});

async function main() {
  try {
    console.log('Sending test email to:', process.env.ADMIN_EMAIL);
    const info = await transporter.sendMail({
      from: `"DeshKhoj Test" <${process.env.SMTP_USER}>`,
      to: process.env.ADMIN_EMAIL,
      subject: "SMTP Test Work", // Checking if it works
      text: "This is a test email to verify SMTP configuration.",
      html: "<b>DeshKhoj SMTP setup is successful!</b>",
    });
    console.log('Success! Message sent:', info.messageId);
  } catch (error) {
    console.error('Failed to send email:', error);
  }
}

main();
