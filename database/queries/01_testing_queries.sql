-- ============================================
-- QUERY 1
-- ============================================

USE aeroops;

SELECT *
FROM airlines;

-- ============================================
-- QUERY 2
-- ============================================

SELECT
    ac.aircraft_id,
    ac.registration_number,
    ac.manufacturer,
    ac.model,
    al.airline_name
FROM aircraft ac
JOIN airlines al
ON ac.airline_id = al.airline_id;

-- ============================================
-- QUERY 3
-- ============================================

SELECT
    al.airline_name,
    COUNT(ac.aircraft_id) AS total_aircraft
FROM airlines al
LEFT JOIN aircraft ac
ON al.airline_id = ac.airline_id
GROUP BY al.airline_name;

-- ============================================
-- QUERY 4
-- ============================================

SELECT *
FROM aircraft
WHERE registration_number = 'PK-GIG';

-- ============================================
-- QUERY 5
-- ============================================

SELECT
    registration_number,
    manufacturer,
    model,
    capacity
FROM aircraft
ORDER BY capacity DESC;

-- ============================================
-- QUERY 6
-- ============================================

SELECT
    f.flight_number,
    al.airline_name,
    f.origin_airport,
    f.destination_airport,
    f.departure_time,
    f.arrival_time,
    f.status
FROM flights f
JOIN aircraft ac
ON f.aircraft_id = ac.aircraft_id
JOIN airlines al
ON ac.airline_id = al.airline_id;

-- ============================================
-- QUERY 7
-- ============================================

SELECT
    a.assignment_id,
    gs.staff_name,
    ghs.service_name,
    f.flight_number,
    a.assignment_date,
    a.status
FROM assignments a
JOIN ground_staff gs
ON a.staff_id = gs.staff_id
JOIN ground_handling_services ghs
ON a.service_id = ghs.service_id
JOIN flights f
ON a.flight_id = f.flight_id;

-- ============================================
-- QUERY 8
-- ============================================

SELECT
    op.report_date,
    f.flight_number,
    gs.staff_name,
    ghs.service_name,
    op.description,
    op.status
FROM operational_reports op
JOIN assignments a
ON op.assignment_id = a.assignment_id
JOIN flights f
ON a.flight_id = f.flight_id
JOIN ground_staff gs
ON a.staff_id = gs.staff_id
JOIN ground_handling_services ghs
ON a.service_id = ghs.service_id;

-- ============================================
-- QUERY 9
-- ============================================

SELECT
    al.airline_name,
    COUNT(f.flight_id) AS total_flights
FROM airlines al
LEFT JOIN aircraft ac
ON al.airline_id = ac.airline_id
LEFT JOIN flights f
ON ac.aircraft_id = f.aircraft_id
GROUP BY al.airline_name;

-- ============================================
-- QUERY 10
-- ============================================

SELECT
    flight_number,
    status
FROM flights
WHERE status <> 'Completed';