USE aeroops;

-- ============================================
-- Table: flights
-- ============================================

CREATE TABLE flights (
    flight_id INT AUTO_INCREMENT PRIMARY KEY,
    aircraft_id INT NOT NULL,
    flight_number VARCHAR(20) NOT NULL UNIQUE,
    origin_airport CHAR(3) NOT NULL,
    destination_airport CHAR(3) NOT NULL,
    departure_time DATETIME NOT NULL,
    arrival_time DATETIME NOT NULL,
    status ENUM(
        'Scheduled',
        'Boarding',
        'Delayed',
        'Departed',
        'Arrived',
        'Cancelled'
    ) DEFAULT 'Scheduled',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_flights_aircraft
        FOREIGN KEY (aircraft_id)
        REFERENCES aircraft(aircraft_id)
);

-- ============================================
-- Table: assignments
-- ============================================

CREATE TABLE assignments (
    assignment_id INT AUTO_INCREMENT PRIMARY KEY,
    flight_id INT NOT NULL,
    staff_id INT NOT NULL,
    service_id INT NOT NULL,
    assignment_date DATE NOT NULL,

    status ENUM(
        'Pending',
        'In Progress',
        'Completed',
        'Cancelled'
    ) DEFAULT 'Pending',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_assignment_flight
        FOREIGN KEY (flight_id)
        REFERENCES flights(flight_id),

    CONSTRAINT fk_assignment_staff
        FOREIGN KEY (staff_id)
        REFERENCES ground_staff(staff_id),

    CONSTRAINT fk_assignment_service
        FOREIGN KEY (service_id)
        REFERENCES ground_handling_services(service_id)
);

-- ============================================
-- Table: operational_reports
-- ============================================

CREATE TABLE operational_reports (
    report_id INT AUTO_INCREMENT PRIMARY KEY,

    assignment_id INT NOT NULL UNIQUE,

    report_date DATE NOT NULL,

    description TEXT,

    status ENUM(
        'Draft',
        'Submitted',
        'Approved',
        'Rejected'
    ) DEFAULT 'Draft',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_report_assignment
        FOREIGN KEY (assignment_id)
        REFERENCES assignments(assignment_id)
);