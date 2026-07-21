-- ============================================
-- Table: flights
-- ============================================

USE aeroops;

INSERT INTO flights
(aircraft_id, flight_number, origin_airport, destination_airport, departure_time, arrival_time, status)
VALUES
(1,'GA203','CGK','DPS','2026-07-21 08:30:00','2026-07-21 10:45:00','Scheduled'),
(2,'QG701','CGK','SUB','2026-07-21 09:00:00','2026-07-21 10:30:00','Scheduled'),
(3,'JT312','CGK','KNO','2026-07-21 11:15:00','2026-07-21 13:35:00','Delayed'),
(4,'ID6510','CGK','UPG','2026-07-21 12:20:00','2026-07-21 15:30:00','Boarding'),
(5,'IU801','CGK','YIA','2026-07-21 14:00:00','2026-07-21 15:15:00','Scheduled');

-- ============================================
-- Table: assignments
-- ============================================

INSERT INTO assignments
(flight_id, staff_id, service_id, assignment_date, status)
VALUES
(1,1,1,'2026-07-21','Assigned'),
(2,2,2,'2026-07-21','Assigned'),
(3,3,3,'2026-07-21','Completed'),
(4,4,4,'2026-07-21','Assigned'),
(5,5,5,'2026-07-21','Completed');

-- ============================================
-- Table: operational_reports
-- ============================================

INSERT INTO operational_reports
(assignment_id, report_date, description, status)
VALUES
(1,'2026-07-21','Passenger check-in completed successfully.','Completed'),
(2,'2026-07-21','Baggage loading completed on schedule.','Completed'),
(3,'2026-07-21','Aircraft cleaning completed before departure.','Completed'),
(4,'2026-07-21','Aircraft marshalled safely to parking stand.','Completed'),
(5,'2026-07-21','Aircraft refueling completed without issues.','Completed');