<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Supprimer la procédure si elle existe
        DB::unprepared('DROP PROCEDURE IF EXISTS recalculer_ratio_batterie;');

        // Création de la procédure
        DB::unprepared('
            CREATE PROCEDURE recalculer_ratio_batterie()
            BEGIN
                DECLARE prev INT DEFAULT NULL;
                DECLARE curr_id BIGINT;
                DECLARE curr_bat INT;

                DECLARE done INT DEFAULT 0;
                DECLARE traj_cursor CURSOR FOR 
                    SELECT id, pourcentage_batterie FROM trajets ORDER BY id;
                DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

                OPEN traj_cursor;

                read_loop: LOOP
                    FETCH traj_cursor INTO curr_id, curr_bat;
                    IF done THEN
                        LEAVE read_loop;
                    END IF;

                    IF prev IS NULL THEN
                        UPDATE recharges SET ratio_batterie = NULL WHERE id = curr_id;
                    ELSE
                        UPDATE recharges 
                        SET ratio_batterie = curr_bat - prev 
                        WHERE id = curr_id;
                    END IF;

                    SET prev = curr_bat;
                END LOOP;

                CLOSE traj_cursor;
            END;
        ');

        // Supprimer les triggers existants
        DB::unprepared('DROP TRIGGER IF EXISTS recalcul_ratio_apres_insert;');
        DB::unprepared('DROP TRIGGER IF EXISTS recalcul_ratio_apres_update;');

        // Création du trigger après insertion
        DB::unprepared('
            CREATE TRIGGER recalcul_ratio_apres_insert
            AFTER INSERT ON trajets
            FOR EACH ROW
            BEGIN
                CALL recalculer_ratio_batterie();
            END;
        ');

        // Création du trigger après mise à jour
        DB::unprepared('
            CREATE TRIGGER recalcul_ratio_apres_update
            AFTER UPDATE ON trajets
            FOR EACH ROW
            BEGIN
                CALL recalculer_ratio_batterie();
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprimer les triggers
        DB::unprepared('DROP TRIGGER IF EXISTS recalcul_ratio_apres_insert;');
        DB::unprepared('DROP TRIGGER IF EXISTS recalcul_ratio_apres_update;');

        // Supprimer la procédure
        DB::unprepared('DROP PROCEDURE IF EXISTS recalculer_ratio_batterie;');
    }
};
