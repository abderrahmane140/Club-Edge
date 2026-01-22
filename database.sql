
CREATE DATABASE club_platform;



CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) CHECK (role IN ('student','admin')) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE clubs (
    id SERIAL PRIMARY KEY,
    name VARCHAR(150) UNIQUE NOT NULL,
    description TEXT,
    president_id INT UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_president FOREIGN KEY (president_id) REFERENCES users(id)
);


CREATE TABLE club_members (
    id SERIAL PRIMARY KEY,
    club_id INT NOT NULL,
    student_id INT UNIQUE,
    joined_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_club FOREIGN KEY (club_id) REFERENCES clubs(id) ON DELETE CASCADE,
    CONSTRAINT fk_student FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE
);


CREATE TABLE events (
    id SERIAL PRIMARY KEY,
    club_id INT NOT NULL,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    event_date DATE NOT NULL,
    location VARCHAR(150),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_event_club FOREIGN KEY (club_id) REFERENCES clubs(id) ON DELETE CASCADE
);


CREATE TABLE event_images (
    id SERIAL PRIMARY KEY,
    event_id INT NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    CONSTRAINT fk_event_img FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
);


CREATE TABLE event_participants (
    id SERIAL PRIMARY KEY,
    event_id INT NOT NULL,
    student_id INT NOT NULL,
    participated BOOLEAN DEFAULT FALSE,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_event_part FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
    CONSTRAINT fk_part_student FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE (event_id, student_id)
);


CREATE TABLE reviews (
    id SERIAL PRIMARY KEY,
    event_id INT NOT NULL,
    student_id INT NOT NULL,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_review_event FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
    CONSTRAINT fk_review_student FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE (event_id, student_id)
);




CREATE TABLE articles (
    id SERIAL PRIMARY KEY,
    club_id INT NOT NULL,
    event_id INT NOT NULL,
    title VARCHAR(150) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_article_club FOREIGN KEY (club_id) REFERENCES clubs(id),
    CONSTRAINT fk_article_event FOREIGN KEY (event_id) REFERENCES events(id)
);


CREATE TABLE article_images (
    id SERIAL PRIMARY KEY,
    article_id INT NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    CONSTRAINT fk_article_img FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE
);


CREATE TABLE logs (
    id SERIAL PRIMARY KEY,
    level VARCHAR(20),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



