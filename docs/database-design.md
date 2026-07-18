# Database Design

## Entity Identification

The following entities have been identified for the AeroOps system.

| Entity | Description |
|---------|-------------|
| User | System user who can access the application |
| Ground Staff | Airport staff responsible for ground handling operations |
| Airline | Airline company operating aircraft |
| Aircraft | Aircraft owned by an airline |
| Flight | Scheduled flight operated by an aircraft |
| Ground Handling Service | Types of services performed on aircraft |
| Assignment | Assignment of ground staff to a flight and service |
| Operational Report | Report generated after an assignment is completed |

---

# Attribute Identification

## User

| Attribute | Description |
|-----------|-------------|
| user_id | Unique identifier |
| name | Full name |
| email | Login email |
| password | Encrypted password |
| role | User role |

---

## Ground Staff

| Attribute | Description |
|-----------|-------------|
| staff_id | Unique identifier |
| full_name | Staff name |
| phone_number | Contact number |
| position | Job position |
| status | Active or inactive |

---

## Airline

| Attribute | Description |
|-----------|-------------|
| airline_id | Unique identifier |
| airline_name | Airline name |
| airline_code | IATA/ICAO code |
| country | Country of origin |

---

## Aircraft

| Attribute | Description |
|-----------|-------------|
| aircraft_id | Unique identifier |
| registration_number | Aircraft registration |
| model | Aircraft model |
| manufacturer | Aircraft manufacturer |
| capacity | Passenger capacity |
| airline_id | Airline owner |

---

## Flight

| Attribute | Description |
|-----------|-------------|
| flight_id | Unique identifier |
| flight_number | Flight number |
| departure_airport | Departure airport |
| arrival_airport | Arrival airport |
| departure_time | Departure time |
| arrival_time | Arrival time |
| aircraft_id | Aircraft used |

---

## Ground Handling Service

| Attribute | Description |
|-----------|-------------|
| service_id | Unique identifier |
| service_name | Service name |
| description | Service description |

---

## Assignment

| Attribute | Description |
|-----------|-------------|
| assignment_id | Unique identifier |
| flight_id | Related flight |
| staff_id | Assigned staff |
| service_id | Assigned service |
| assignment_date | Assignment date |
| status | Assignment status |

---

## Operational Report

| Attribute | Description |
|-----------|-------------|
| report_id | Unique identifier |
| assignment_id | Related assignment |
| report_time | Report timestamp |
| notes | Operational notes |
| report_status | Final status |

---

# Primary Key & Foreign Key

## User

| Attribute | Key |
|-----------|-----|
| user_id | Primary Key |

---

## Ground Staff

| Attribute | Key |
|-----------|-----|
| staff_id | Primary Key |

---

## Airline

| Attribute | Key |
|-----------|-----|
| airline_id | Primary Key |

---

## Aircraft

| Attribute | Key |
|-----------|-----|
| aircraft_id | Primary Key |
| airline_id | Foreign Key → Airline.airline_id |

---

## Flight

| Attribute | Key |
|-----------|-----|
| flight_id | Primary Key |
| aircraft_id | Foreign Key → Aircraft.aircraft_id |

---

## Ground Handling Service

| Attribute | Key |
|-----------|-----|
| service_id | Primary Key |

---

## Assignment

| Attribute | Key |
|-----------|-----|
| assignment_id | Primary Key |
| flight_id | Foreign Key → Flight.flight_id |
| staff_id | Foreign Key → GroundStaff.staff_id |
| service_id | Foreign Key → GroundHandlingService.service_id |

---

## Operational Report

| Attribute | Key |
|-----------|-----|
| report_id | Primary Key |
| assignment_id | Foreign Key → Assignment.assignment_id |