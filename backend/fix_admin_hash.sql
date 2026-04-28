-- DeshKhoj Admin Password Reset
-- New password: Dk_2k25 (bcrypt hash, 12 rounds)
UPDATE user_list SET password = '$2b$12$cMT.LxI5xvfK.Ble4tkQvOvW.Z6lqcN0cQVeztPZdbIIN3BiCI4PC', status = 'active' WHERE username = 'admin';
