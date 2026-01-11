# Contact Management

![Status](https://img.shields.io/badge/Status-Production-brightgreen)
![Laravel](https://img.shields.io/badge/Backend-Laravel_10-blue)
![PHP](https://img.shields.io/badge/PHP-8.1%2B-777bb4)
![Docker](https://img.shields.io/badge/Infra-Docker-2496ED)
![MySQL](https://img.shields.io/badge/Database-MySQL-4479A1)

---

## 📖 Sobre o Projeto

O **Contact Management** é uma aplicação web para cadastro e gerenciamento de contatos, construída com Laravel seguindo boas práticas de arquitetura (SOLID, Clean Architecture, Service/Repository Pattern). O sistema permite autenticação de usuários, cadastro, edição, exclusão e listagem de contatos, com validação robusta e cobertura de testes.

### 🚀 Principais Funcionalidades

*   **Autenticação de Usuário**: Login e logout protegendo as rotas de CRUD.
*   **CRUD de Contatos**: Cadastro, edição, visualização e exclusão lógica (soft delete).
*   **Validação Avançada**: E-mail e telefone únicos (ignorando soft deletes), regras customizadas via Form Request.
*   **Arquitetura Limpa**: Separação em Service, Repository, Controller e Request.
*   **Testes Automatizados**: Feature e unit tests para garantir a qualidade.
*   **UI Responsiva**: Blade + Bootstrap.

---

## 🛠️ Tecnologias Utilizadas

*   **PHP 8.1+**
*   **Laravel 10**
*   **MySQL**
*   **Bootstrap 5**
*   **Composer**
*   **Node.js & npm** (opcional, para assets)

---

## ⚙️ Pré-requisitos

*   [PHP 8.1+](https://www.php.net/)
*   [Composer](https://getcomposer.org/)
*   [MySQL](https://www.mysql.com/)
*   [Node.js & npm](https://nodejs.org/) (opcional)
*   [Docker](https://www.docker.com/) (opcional, caso opte pelo Laravel sail)

---

## 🚀 Como Executar

### 1. Clone o Repositório
```bash
git clone https://github.com/gugacamara/contact-management.git
cd contact-management
```

### 2. Instale as Dependências
```bash
composer install
```

### 3. Configure o Ambiente
```bash
cp .env.example .env
# Edite o .env com suas configurações de banco e app
```

### 4. Gere a Key da Aplicação
```bash
php artisan key:generate
```

### 5. Rode as Migrations
```bash
php artisan migrate
```

### 6. (Opcional) Rode os Seeds
```bash
php artisan db:seed
```

### 7. (Opcional) Instale os Assets
```bash
npm install && npm run dev
```

### 8. Suba a Aplicação
```bash
php artisan serve
# Ou use Laravel Sail/Docker se preferir
```

---

## 🧪 Rodando os Testes

```bash
php artisan test
```

---

## 📂 Estrutura do Projeto

```
contact-management/
├── app/
│   ├── Http/Controllers/    # Controllers
│   ├── Http/Requests/       # Form Requests
│   ├── Models/              # Eloquent Models
│   ├── Repositories/        # Repositories & Interfaces
│   └── Services/            # Service Layer
├── resources/views/         # Blade Templates
├── tests/Feature/           # Feature Tests
├── tests/Unit/              # Unit Tests
├── database/                # Migrations, Factories, Seeders
├── public/                  # Public Assets
├── routes/                  # Web Routes
└── ...
```

---
[<img src="https://github.com/gugacamara.png" width="100" align="top" alt="Gustavo Câmara"/>](https://github.com/gugacamara)
Desenvolvido por [Gustavo Câmara](https://github.com/gugacamara) 🚀
Contato [E-mail](mailto:gustavocamara.lv@gmail.com).

---

## 📝 Licença

Este projeto está sob a licença MIT.