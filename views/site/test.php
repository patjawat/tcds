GRANT All PRIVILEGES ON *.*  to 'root'@'localhost' IDENTIFIED BY 'docker'  WITH GRANT OPTION;
GRANT All PRIVILEGES ON *.*  to 'root'@'127.0.0.1' IDENTIFIED BY 'docker'  WITH GRANT OPTION;
GRANT All PRIVILEGES ON *.*  to 'root'@'::1' IDENTIFIED BY 'docker'  WITH GRANT OPTION;
GRANT All PRIVILEGES ON *.*  to 'root'@'%' IDENTIFIED BY 'docker'  WITH GRANT OPTION;
flush privileges;

                'record_complete_right_evt',
              'record_complete_right_evt_note',
              'record_complete_right_evt_date',
              'record_complete_right_bypass',
              'record_complete_right_bypass_note',
              'record_complete_right_bypass_date',
              'record_complete_right_hybrid',
              'record_complete_right_hybrid_note',
              'record_complete_right_hybrid_date'