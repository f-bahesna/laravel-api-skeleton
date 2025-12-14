# Laravel API Skeleton (DDD + CQRS)

A lightweight Laravel API skeleton designed to demonstrate **Domain-Driven Design (DDD)**
and **CQRS-style command handling** without heavy frameworks or complex configuration.

This project is intentionally minimal and opinionated, focusing on clarity, extensibility,
and senior-level architectural patterns.

---

## Features

### 1. CQRS (Write Side)
- Command–Handler pattern (`CreateAcmeCommand` → `CreateAcmeHandler`)
- Clear separation between application orchestration and domain logic
- No controllers required

### 2. YAML-based Routing
- Routes are defined using YAML
- Automatically loaded per module
- Clean and readable route definitions

### 3. Automatic Repository Binding
- Domain repositories are defined as interfaces
- Infrastructure implementations are auto-bound via conventions
- No manual service provider registration

### 4. Command Dispatcher
- Central dispatcher resolves commands to handlers automatically
- No manual wiring between command and handler
- Convention-based and DRY

---

## Structure

```text
src/
├── Acme/
│   ├── Application/
│   │   ├── Command/
│   │   └── Handler/
│   ├── Domain/
│   │   ├── Entity/
│   │   └── Repository/
│   └── Infrastructure/
│       ├── Model/
│       └── Repository/
