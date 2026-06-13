-- Main database creation
CREATE DATABASE mon_artisan_marocain;
USE mon_artisan_marocain;

-- 1. Users Table (for both clients and artisans)
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    user_type ENUM('client', 'artisan') NOT NULL,
    profile_image VARCHAR(500),
    location VARCHAR(255),
    city VARCHAR(100),
    bio TEXT,
    facial_data JSON, -- For artisan facial recognition
    is_verified BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 2. Artisans Table (extends users table)
CREATE TABLE artisans (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    specialty VARCHAR(255) NOT NULL,
    years_experience INT,
    hourly_rate DECIMAL(10,2),
    rating DECIMAL(3,2) DEFAULT 0.00,
    total_reviews INT DEFAULT 0,
    completed_jobs INT DEFAULT 0,
    intervention_zone VARCHAR(500), -- JSON or text describing service areas
    is_certified BOOLEAN DEFAULT FALSE,
    is_available BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_specialty (specialty),
    INDEX idx_rating (rating)
);

-- 3. Services Table
CREATE TABLE services (
    id INT PRIMARY KEY AUTO_INCREMENT,
    artisan_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price_range VARCHAR(100), -- e.g., "200-500 DH"
    base_price DECIMAL(10,2),
    duration_hours INT,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (artisan_id) REFERENCES artisans(id) ON DELETE CASCADE,
    INDEX idx_name (name)
);

-- 4. Skills Table
CREATE TABLE skills (
    id INT PRIMARY KEY AUTO_INCREMENT,
    artisan_id INT NOT NULL,
    skill_name VARCHAR(255) NOT NULL,
    proficiency_level ENUM('beginner', 'intermediate', 'expert') DEFAULT 'intermediate',
    FOREIGN KEY (artisan_id) REFERENCES artisans(id) ON DELETE CASCADE,
    INDEX idx_skill (skill_name)
);

-- 5. Certifications Table
CREATE TABLE certifications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    artisan_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    issuing_organization VARCHAR(255),
    issue_date DATE,
    expiry_date DATE,
    credential_id VARCHAR(255),
    certificate_file VARCHAR(500),
    FOREIGN KEY (artisan_id) REFERENCES artisans(id) ON DELETE CASCADE
);

-- 6. Portfolio Table
CREATE TABLE portfolio (
    id INT PRIMARY KEY AUTO_INCREMENT,
    artisan_id INT NOT NULL,
    title VARCHAR(255),
    description TEXT,
    image_url VARCHAR(500) NOT NULL,
    project_date DATE,
    project_type VARCHAR(100),
    is_featured BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (artisan_id) REFERENCES artisans(id) ON DELETE CASCADE
);

-- 7. Reviews Table
CREATE TABLE reviews (
    id INT PRIMARY KEY AUTO_INCREMENT,
    artisan_id INT NOT NULL,
    client_id INT NOT NULL,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    job_type VARCHAR(255),
    is_verified BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (artisan_id) REFERENCES artisans(id) ON DELETE CASCADE,
    FOREIGN KEY (client_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_rating (rating),
    INDEX idx_artisan (artisan_id)
);

-- 8. Availability Table
CREATE TABLE availability (
    id INT PRIMARY KEY AUTO_INCREMENT,
    artisan_id INT NOT NULL,
    day_of_week ENUM('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'),
    start_time TIME,
    end_time TIME,
    is_available BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (artisan_id) REFERENCES artisans(id) ON DELETE CASCADE,
    UNIQUE KEY unique_artisan_day (artisan_id, day_of_week)
);

-- 9. Job Categories Table
CREATE TABLE job_categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name_fr VARCHAR(255) NOT NULL,
    name_ar VARCHAR(255) NOT NULL,
    description TEXT,
    icon VARCHAR(100),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 10. Job Posts/Requests Table
CREATE TABLE job_requests (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    category_id INT,
    location VARCHAR(255) NOT NULL,
    budget DECIMAL(10,2),
    urgency ENUM('low', 'medium', 'high') DEFAULT 'medium',
    status ENUM('pending', 'accepted', 'in_progress', 'completed', 'cancelled') DEFAULT 'pending',
    preferred_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES job_categories(id),
    INDEX idx_status (status),
    INDEX idx_location (location)
);

-- 11. Job Applications Table
CREATE TABLE job_applications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    job_id INT NOT NULL,
    artisan_id INT NOT NULL,
    proposed_price DECIMAL(10,2),
    message TEXT,
    estimated_days INT,
    status ENUM('pending', 'accepted', 'rejected') DEFAULT 'pending',
    applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (job_id) REFERENCES job_requests(id) ON DELETE CASCADE,
    FOREIGN KEY (artisan_id) REFERENCES artisans(id) ON DELETE CASCADE,
    UNIQUE KEY unique_job_artisan (job_id, artisan_id)
);

-- 12. Messages Table
CREATE TABLE messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    sender_id INT NOT NULL,
    receiver_id INT NOT NULL,
    job_id INT,
    message_text TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (receiver_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (job_id) REFERENCES job_requests(id) ON DELETE SET NULL,
    INDEX idx_conversation (sender_id, receiver_id),
    INDEX idx_sent_at (sent_at)
);

-- 13. Cities Table (for location data)
CREATE TABLE cities (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name_fr VARCHAR(255) NOT NULL,
    name_ar VARCHAR(255) NOT NULL,
    region VARCHAR(255),
    latitude DECIMAL(10,8),
    longitude DECIMAL(11,8),
    is_active BOOLEAN DEFAULT TRUE
);

-- 14. Favorites Table
CREATE TABLE favorites (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_id INT NOT NULL,
    artisan_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (artisan_id) REFERENCES artisans(id) ON DELETE CASCADE,
    UNIQUE KEY unique_client_artisan (client_id, artisan_id)
);

-- 15. Notifications Table
CREATE TABLE notifications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    type ENUM('job_alert', 'message', 'application', 'review', 'system') NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    related_id INT, -- ID of related entity (job, message, etc.)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_user_unread (user_id, is_read)
);

-- 16. Search History Table
CREATE TABLE search_history (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    search_query VARCHAR(500) NOT NULL,
    location VARCHAR(255),
    category_id INT,
    search_results_count INT,
    searched_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (category_id) REFERENCES job_categories(id),
    INDEX idx_user_search (user_id, searched_at)
);

-- Insert initial data for job categories
INSERT INTO job_categories (name_fr, name_ar, description, icon) VALUES
('Plombier', 'سباك', 'Services de plomberie et installation sanitaire', 'fa-faucet'),
('Électricien', 'كهربائي', 'Installation et réparation électrique', 'fa-bolt'),
('Menuisier', 'نجار', 'Travaux de menuiserie et ébénisterie', 'fa-hammer'),
('Peintre', 'رسام', 'Peinture et décoration intérieure/extérieure', 'fa-paint-roller'),
('Carreleur', 'بلاط', 'Pose de carrelage et revêtements de sol', 'fa-border-all'),
('Maçon', 'بناء', 'Travaux de maçonnerie et construction', 'fa-trowel'),
('Serrurier', 'قفال', 'Services de serrurerie et sécurité', 'fa-key'),
('Chauffagiste', 'فني تدفئة', 'Installation et entretien de chauffage', 'fa-fire'),
('Ébéniste', 'نقاش خشب', 'Fabrication et restauration de meubles', 'fa-chair');

-- Insert initial cities data
INSERT INTO cities (name_fr, name_ar, region) VALUES
('Casablanca', 'الدار البيضاء', 'Casablanca-Settat'),
('Rabat', 'الرباط', 'Rabat-Salé-Kénitra'),
('Fès', 'فاس', 'Fès-Meknès'),
('Marrakech', 'مراكش', 'Marrakech-Safi'),
('Tanger', 'طنجة', 'Tanger-Tétouan-Al Hoceïma'),
('Agadir', 'أكادير', 'Souss-Massa'),
('Salé', 'سلا', 'Rabat-Salé-Kénitra'),
('Meknès', 'مكناس', 'Fès-Meknès'),
('Oujda', 'وجدة', 'Oriental');