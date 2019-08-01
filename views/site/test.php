GRANT All PRIVILEGES ON *.* to 'root'@'localhost' IDENTIFIED BY 'docker' WITH GRANT OPTION;
GRANT All PRIVILEGES ON *.* to 'root'@'127.0.0.1' IDENTIFIED BY 'docker' WITH GRANT OPTION;
GRANT All PRIVILEGES ON *.* to 'root'@'::1' IDENTIFIED BY 'docker' WITH GRANT OPTION;
GRANT All PRIVILEGES ON *.* to 'root'@'%' IDENTIFIED BY 'docker' WITH GRANT OPTION;
flush privileges;

'skin_sesion_wart_right' => $model->record_complete['skin_sesion_wart_right'],
                    'skin_sesion_wart_number_right' => $model->record_complete['skin_sesion_wart_number_right'],
                    'skin_sesion_wart_left' => $model->record_complete['skin_sesion_wart_left'],
                    'skin_sesion_wart_left' => $model->record_complete['skin_sesion_wart_left'],
                    'skin_sesion_wart_number_left' => $model->record_complete['skin_sesion_wart_number_left'],