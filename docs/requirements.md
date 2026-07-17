# Software Requirements Specification (SRS)

## Project Information

**Project Name**

AeroOps

**Project Type**

Integrated Airport Ground Handling Management System

**Version**

v0.1.0

**Status**

Requirement Analysis

---

## Introduction

AeroOps is a web-based application developed to manage airport ground handling operations. The system centralizes operational data such as airlines, aircraft, staff assignments, flight schedules, and operational reports to improve efficiency and data consistency.

---

## Project Objectives

- Manage master data.
- Manage airport ground handling operations.
- Record operational activities.
- Provide operational dashboard.
- Learn software engineering through a real project.

---

# Functional Requirements

The system shall provide the following functionalities:

### Authentication

- Users can log in to the system.
- Users can log out securely.
- Users can update their profile.

---

### Dashboard

- Display operational summary.
- Display aircraft statistics.
- Display staff statistics.
- Display today's flight information.

---

### Master Data

The system shall manage:

- Airlines
- Aircraft
- Ground Staff
- Ground Handling Services

---

### Operations

The system shall:

- Manage flight schedules.
- Assign ground staff to operational services.
- Record operational reports.
- Update assignment status.

---

# Non-Functional Requirements

The system should meet the following quality requirements:

### Security

- Only authenticated users can access the system.
- Passwords must be encrypted.
- User access is controlled based on roles.

---

### Performance

- The system should load pages efficiently.
- Database queries should be optimized.

---

### Usability

- The user interface should be simple and easy to use.
- Navigation should be clear and consistent.

---

### Maintainability

- The project should use a modular structure.
- Source code should follow Laravel coding standards.

---

### Compatibility

- The system should run on modern web browsers.
- The application should be responsive on desktop and mobile devices.

---

# Business Rules

The following business rules define how the system operates:

1. One airline can own multiple aircraft.
2. One aircraft can be scheduled for multiple flights.
3. One flight can have multiple ground handling assignments.
4. One ground staff member can handle multiple assignments.
5. Each assignment is associated with one ground handling service.
6. Each assignment may produce one operational report.
7. Only authenticated users can access the system.
8. Only administrators can manage master data.