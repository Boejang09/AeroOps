USE aeroops;

-- ============================================
-- Table: Airlines
-- ============================================

INSERT INTO airlines (airline_code, airline_name, country)
VALUES
('GA', 'Garuda Indonesia', 'Indonesia'),
('QG', 'Citilink', 'Indonesia'),
('JT', 'Lion Air', 'Indonesia'),
('ID', 'Batik Air', 'Indonesia'),
('IU', 'Super Air Jet', 'Indonesia'),
('IW', 'Wings Air', 'Indonesia'),
('IP', 'Pelita Air', 'Indonesia'),
('AK', 'Indonesia AirAsia', 'Indonesia');

-- ============================================
-- Table: aircraft
-- ============================================

INSERT INTO aircraft
(airline_id, registration_number, manufacturer, model, capacity)
VALUES
(1, 'PK-GIG', 'Boeing', '737-800', 162),
(2, 'PK-GQH', 'Airbus', 'A320', 180),
(3, 'PK-LFK', 'Boeing', '737-900ER', 215),
(4, 'PK-BKF', 'Boeing', '737 MAX 8', 180),
(5, 'PK-SAJ', 'Airbus', 'A320', 180),
(6, 'PK-WGI', 'ATR', '72-600', 72),
(7, 'PK-PLA', 'Airbus', 'A320', 180),
(8, 'PK-AKA', 'Airbus', 'A320', 180);

-- ============================================
-- Table: ground_staff
-- ============================================

INSERT INTO ground_staff
(staff_name, position, phone, email)
VALUES
('Andi Saputra', 'Ramp Officer', '081234567801', 'andi@aeroops.com'),
('Budi Hartono', 'Check-in Officer', '081234567802', 'budi@aeroops.com'),
('Citra Lestari', 'Baggage Officer', '081234567803', 'citra@aeroops.com'),
('Dewi Anggraini', 'Gate Officer', '081234567804', 'dewi@aeroops.com'),
('Eko Prasetyo', 'Supervisor', '081234567805', 'eko@aeroops.com');

-- ============================================
-- Table: ground_handling_services
-- ============================================

INSERT INTO ground_handling_services
(service_name, description)
VALUES
('Passenger Handling', 'Passenger check-in and boarding'),
('Baggage Handling', 'Loading and unloading baggage'),
('Aircraft Cleaning', 'Cabin cleaning service'),
('Aircraft Marshalling', 'Aircraft parking guidance'),
('Aircraft Refueling', 'Aircraft fuel service');