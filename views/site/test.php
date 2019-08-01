GRANT All PRIVILEGES ON *.* to 'root'@'localhost' IDENTIFIED BY 'docker' WITH GRANT OPTION;
GRANT All PRIVILEGES ON *.* to 'root'@'127.0.0.1' IDENTIFIED BY 'docker' WITH GRANT OPTION;
GRANT All PRIVILEGES ON *.* to 'root'@'::1' IDENTIFIED BY 'docker' WITH GRANT OPTION;
GRANT All PRIVILEGES ON *.* to 'root'@'%' IDENTIFIED BY 'docker' WITH GRANT OPTION;
flush privileges;

'toenail_problem_right' => $model->record_complete['toenail_problem_rightt'],
                    'fungal_nail_right' => $model->record_complete['fungal_nail_right'],
                    'hypertrophic_right' => $model->record_complete['hypertrophic_right'],
                    'distrophic_right' => $model->record_complete['distrophic_right'],
                    'discolored_right' => $model->record_complete['discolored_right'],
                    'longated_right' => $model->record_complete['longated_right'],
                    'ingrown_right' => $model->record_complete['ingrown_right'],
                    'involuted_right' => $model->record_complete['involuted_right'],
                    'splitting_right' => $model->record_complete['splitting_right'],