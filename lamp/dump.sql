--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1
-- Dumped by pg_dump version 13.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

ALTER TABLE ONLY public.subjects DROP CONSTRAINT subjects_pkey;
ALTER TABLE ONLY public.people DROP CONSTRAINT people_pkey;
ALTER TABLE ONLY public.grades DROP CONSTRAINT grades_pkey;
ALTER TABLE ONLY public.faculties DROP CONSTRAINT faculties_pkey;
DROP TABLE public.subjects;
DROP TABLE public.people;
DROP TABLE public.grades;
DROP TABLE public.faculties;
SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: faculties; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.faculties (
    id integer NOT NULL,
    faculty character varying(255)
);


ALTER TABLE public.faculties OWNER TO postgres;

--
-- Name: grades; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.grades (
    id integer NOT NULL,
    person_id integer,
    subject_id integer,
    grade integer,
    date date,
    faculty_id integer
);


ALTER TABLE public.grades OWNER TO postgres;

--
-- Name: people; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.people (
    id integer NOT NULL,
    name character varying(255),
    surname character varying(255)
);


ALTER TABLE public.people OWNER TO postgres;

--
-- Name: subjects; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.subjects (
    id integer NOT NULL,
    subject character varying
);


ALTER TABLE public.subjects OWNER TO postgres;

--
-- Data for Name: faculties; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.faculties VALUES (1, 'Гриффендор');
INSERT INTO public.faculties VALUES (2, 'Пуффендуй');
INSERT INTO public.faculties VALUES (3, 'Слизерин');


--
-- Data for Name: grades; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.grades VALUES (1, 1, 1, 5, '2021-01-01', 1);
INSERT INTO public.grades VALUES (2, 2, 2, 4, '2021-01-02', 2);
INSERT INTO public.grades VALUES (3, 3, 3, 3, '2021-01-03', 3);


--
-- Data for Name: people; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.people VALUES (1, 'Стивен', 'Кинг');
INSERT INTO public.people VALUES (2, 'Амадей', 'Моцарт');
INSERT INTO public.people VALUES (3, 'Исаак', 'Ньютон');


--
-- Data for Name: subjects; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.subjects VALUES (1, 'Литература');
INSERT INTO public.subjects VALUES (2, 'Музыка');
INSERT INTO public.subjects VALUES (3, 'Физика');


--
-- Name: faculties faculties_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.faculties
    ADD CONSTRAINT faculties_pkey PRIMARY KEY (id);


--
-- Name: grades grades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grades
    ADD CONSTRAINT grades_pkey PRIMARY KEY (id);


--
-- Name: people people_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.people
    ADD CONSTRAINT people_pkey PRIMARY KEY (id);


--
-- Name: subjects subjects_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.subjects
    ADD CONSTRAINT subjects_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--
