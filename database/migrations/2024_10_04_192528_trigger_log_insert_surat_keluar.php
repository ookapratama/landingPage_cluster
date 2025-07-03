<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER log_insert_surat_keluar AFTER INSERT ON `surat_keluars` FOR EACH ROW
            BEGIN 
                DECLARE m_desc TEXT;
                SET m_desc := CONCAT("Telah membuat data surat keluar dengan perihal ",NEW.perihal);

                INSERT INTO log_surats (activity, jenis_log, `desc`, user_id, created_at)
                VALUES ("Create", "Surat keluar", m_desc, NEW.created_by, CURRENT_TIMESTAMP());
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // DB::unprepared('DROP TRIGGER `log_insert_surat_keluar`');
        Schema::dropIfExists('log_insert_surat_keluar');

    }
};
