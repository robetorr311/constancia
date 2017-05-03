BEGIN TRANSACTION;

-- Table: sys_intranet_admin.ci_sessions

-- DROP TABLE sys_intranet_admin.ci_sessions;

CREATE TABLE sys_intranet_admin.ci_sessions
(
  session_id character varying(40) NOT NULL DEFAULT 0,
  ip_address character varying(45) NOT NULL DEFAULT 0,
  user_agent character varying(120) NOT NULL,
  last_activity bigint NOT NULL DEFAULT 0,
  user_data text NOT NULL,
  CONSTRAINT ci_sessionprimary_key PRIMARY KEY (session_id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE sys_intranet_admin.ci_sessions
  OWNER TO userdelmar;
COMMENT ON TABLE sys_intranet_admin.ci_sessions
  IS 'Almacena las sesiones de CodeIgniter';
