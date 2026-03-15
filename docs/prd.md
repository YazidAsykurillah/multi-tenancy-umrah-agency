# Product Requirements Document (PRD)
## Umrah Travel Management SaaS

Version: 1.0  
Status: Draft – MVP Definition  
Author: Product Team  
Date: 2026

---

# 1. Product Overview

Umrah Travel Management SaaS is a cloud-based platform designed to help Umrah travel agencies in Indonesia manage their operational workflows digitally.

The platform enables travel agencies to manage:

- Umrah travel packages
- Departure groups
- Pilgrim (jamaah) data
- Pilgrim payment tracking
- Document status tracking

The primary goal of this product is to **simplify travel agency operations that are currently managed through spreadsheets or manual processes**.

The system will be built using a **multi-tenant SaaS architecture**, allowing multiple travel agencies to use the same platform while ensuring their data remains isolated.

---

# 2. Target Users

The target users of this system are Umrah travel agencies in Indonesia.

## 2.1 Primary Users

### Travel Owner

The owner of the travel agency.

Responsibilities:

- Monitoring operational performance
- Monitoring departure groups
- Monitoring pilgrim payments

Needs:

- Operational dashboard
- High-level business insights
- Monitoring active departures

---

### Travel Admin

Operational staff responsible for managing daily travel operations.

Responsibilities:

- Managing pilgrim data
- Managing departures
- Recording payments
- Tracking document completion

Needs:

- Simple operational interface
- Fast data entry
- Clear tracking of pilgrim progress

---

# 3. Problem Statement

Many Umrah travel agencies in Indonesia face the following challenges:

1. Pilgrim data is scattered across multiple spreadsheets
2. Payment tracking is inconsistent or manual
3. Difficult to monitor departure quotas
4. Pilgrim documents are not centrally tracked
5. Lack of operational dashboards

As a result:

- Operations become inefficient
- Data errors are common
- Monitoring pilgrim readiness is difficult

This product aims to solve these operational problems.

---

# 4. Product Goals

The main objectives of the product are:

1. Provide structured pilgrim data management
2. Simplify payment tracking
3. Manage departure groups efficiently
4. Track document readiness
5. Provide operational visibility through dashboards

---

# 5. MVP Scope

The MVP will focus on the **core operational workflow of Umrah travel agencies**.

Modules included in MVP:

1. Tenant Management
2. User Management
3. Package Management
4. Departure Management
5. Pilgrim Management
6. Payment Tracking
7. Document Tracking
8. Dashboard

The following features are **excluded from the MVP**:

- Room sharing
- Seat allocation
- Bus allocation
- Advanced itinerary management

These features may be implemented in future versions.

---

# 6. System Architecture

The system will use a **multi-tenant SaaS architecture with a shared database**.

All operational data tables will include a field:

tenant_id

Purpose:

- Ensure data isolation between travel agencies
- Maintain system security
- Support scalable SaaS architecture

---

# 7. Core Entities

The core system entities include:

- Tenants
- Users
- Packages
- Departures
- Pilgrims
- Payments
- Documents

---

# 8. Feature Requirements

## 8.1 Tenant Management

A tenant represents a travel agency.

Features:

- Create tenant
- Edit tenant information
- Manage users within the tenant

Tenant data fields:

- name
- slug
- created_at

---

## 8.2 User Management

Users are system accounts that can access the platform.

Users have a **many-to-many relationship with tenants**.

A user may belong to multiple tenants.

User roles within a tenant:

- owner
- admin

Features:

- Add users
- Remove users
- Assign roles

---

## 8.3 Package Management

Packages represent Umrah travel products offered by the agency.

Examples:

- Umrah Regular 9 Days
- Umrah Ramadan
- Umrah Plus Turkey

Package data fields:

- name
- price
- duration_days
- airline
- hotel
- description

Features:

- Create package
- Edit package
- Delete package

---

## 8.4 Departure Management

Departures represent actual travel groups for a package.

Example:

Package: Umrah Regular

Departures:

- January 10, 2026
- January 20, 2026

Departure data fields:

- package_id
- departure_date
- return_date
- quota
- status

Features:

- Create departure
- Edit departure
- View pilgrims assigned to a departure
- Monitor quota availability

---

## 8.5 Pilgrim Management

Pilgrims represent individuals who will perform the Umrah pilgrimage.

Each pilgrim belongs to one departure.

Pilgrim data fields:

- name
- national_id (NIK)
- passport_number
- phone
- birth_date
- address
- status

Pilgrim status examples:

- prospect
- deposit_paid
- fully_paid
- document_processing
- visa_approved
- ready_to_depart

Features:

- Add pilgrim
- Edit pilgrim data
- Assign pilgrim to departure
- View pilgrim list

---

## 8.6 Payment Tracking

Payments track pilgrim financial transactions.

A pilgrim may have multiple payments.

Examples:

- Deposit (DP)
- Installment
- Full payment

Payment data fields:

- pilgrim_id
- amount
- payment_date
- payment_method
- note

Features:

- Record payment
- View payment history
- Calculate total payments

---

## 8.7 Document Tracking

Document tracking monitors the readiness of pilgrim documents.

Document types:

- passport
- visa
- ticket
- vaccine
- insurance

Document statuses:

- not_submitted
- processing
- completed

Document data fields:

- pilgrim_id
- document_type
- status
- file_path

Features:

- Update document status
- Upload document files

---

## 8.8 Dashboard

The dashboard provides operational insights.

Dashboard metrics:

- total pilgrims
- active departures
- unpaid pilgrims
- pending documents
- upcoming departures

Purpose:

Provide travel owners and admins with a quick overview of operational status.

---

# 9. User Workflow

Typical operational workflow within the system:

1. Owner creates a package
2. Admin creates departures
3. Admin registers pilgrims
4. Pilgrims are assigned to departures
5. Admin records pilgrim payments
6. Admin tracks document completion

---

# 10. Non-Functional Requirements

## Security

- All data must be isolated by tenant
- Users may only access data belonging to their tenant

## Performance

- The system must support hundreds of tenants
- All queries must include tenant filtering

## Scalability

The architecture must support future expansion such as:

- Room sharing
- Bus allocation
- Manifest management
- Reseller systems
- Payment gateway integration

---

# 11. Future Features (Post-MVP)

Potential future modules include:

- Room sharing management
- Flight seat allocation
- Bus allocation
- Pilgrim reseller system
- Payment gateway integration
- WhatsApp notifications
- Digital pilgrim manifest
- Mobile application for pilgrims

---

# 12. Success Metrics

Key product success indicators:

- Number of travel agencies using the platform
- Number of pilgrims managed in the system
- User login frequency
- User retention rate

---

# 13. MVP Release Plan

Development timeline:

Week 1  
System foundation and tenant architecture

Week 2  
Package and departure modules

Week 3  
Pilgrim and payment modules

Week 4  
Document tracking and dashboard

Goal: MVP ready for beta usage within **4 weeks**.

---

# 14. Risks

Potential risks include:

1. Travel agencies are accustomed to using spreadsheets
2. Users may require onboarding and training
3. Different agencies may have slightly different workflows

Mitigation strategies:

- Keep the user interface simple
- Align system workflow with real travel operations
- Provide easy onboarding

---

# 15. Conclusion

Umrah Travel Management SaaS aims to become a digital operational platform for Umrah travel agencies in Indonesia.

By focusing on essential features such as pilgrim management, departure tracking, payment monitoring, and document tracking, the MVP can deliver immediate operational value without unnecessary complexity.

The multi-tenant SaaS architecture allows the platform to scale as the product grows within the Umrah travel industry.