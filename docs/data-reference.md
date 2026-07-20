# Data Reference

## Overview

This document defines the reference data used throughout the AeroOps Ground Handling Management System.

The project uses real-world Indonesian aviation data whenever possible to improve realism and portfolio quality.

---

# Airlines

The following airlines are used as sample data.

| Code | Airline |
|------|---------|
| GA | Garuda Indonesia |
| QG | Citilink |
| JT | Lion Air |
| ID | Batik Air |
| IU | Super Air Jet |
| IW | Wings Air |
| IP | Pelita Air |
| QZ | Indonesia AirAsia |

---

# Airports

The following airports are used in the initial database.

| IATA | ICAO | Airport | City |
|------|------|---------|------|
| CGK | WIII | Soekarno–Hatta International Airport | Tangerang |
| HLP | WIHH | Halim Perdanakusuma Airport | Jakarta |
| SUB | WARR | Juanda International Airport | Surabaya |
| DPS | WADD | I Gusti Ngurah Rai International Airport | Denpasar |
| KNO | WIMM | Kualanamu International Airport | Deli Serdang |
| UPG | WAAA | Sultan Hasanuddin International Airport | Makassar |
| YIA | WAHI | Yogyakarta International Airport | Kulon Progo |
| BPN | WALL | SAMS Sepinggan International Airport | Balikpapan |

---

# Aircraft Registration

Indonesian aircraft registrations begin with:

PK-XXX

Example:

- PK-GIG
- PK-LFP
- PK-GPP

---

# Ground Handling Services

The system supports several common ground handling services.

- Passenger Handling
- Baggage Handling
- Cargo Handling
- Aircraft Cleaning
- Aircraft Marshalling
- Pushback Service
- Refueling Coordination
- Catering Coordination

---

# Flight Status

Available flight status values.

- Scheduled
- Boarding
- Delayed
- Departed
- Arrived
- Cancelled

---

# Assignment Status

Available assignment status values.

- Pending
- In Progress
- Completed
- Cancelled

---

# Report Status

Available report status values.

- Draft
- Submitted
- Approved
- Rejected

---

# Notes

This reference document serves as the primary source for sample data used in:

- MySQL Seeders
- Laravel Database Seeders
- API Testing
- UI Demonstrations