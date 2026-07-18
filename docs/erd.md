# Entity Relationship Diagram (ERD)

## Entity Relationships

Airline
│
└── 1 ----- N Aircraft

Aircraft
│
└── 1 ----- N Flight

Flight
│
└── 1 ----- N Assignment

Ground Staff
│
└── 1 ----- N Assignment

Ground Handling Service
│
└── 1 ----- N Assignment

Assignment
│
└── 1 ----- 1 Operational Report

+-----------+
|  Airline  |
+-----------+
      |
      | 1
      |
      | N
+------------+
|  Aircraft  |
+------------+
      |
      | 1
      |
      | N
+----------+
|  Flight  |
+----------+
      |
      | 1
      |
      | N
+--------------+
| Assignment   |
+--------------+
   /         \
  /           \
 N             N
 |             |
 |             |
1|             |1
 |             |
+-----------+  +--------------------------+
|GroundStaff|  |GroundHandlingService     |
+-----------+  +--------------------------+

        |
        |1
        |
        |1
+------------------+
|OperationalReport |
+------------------+