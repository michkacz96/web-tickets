<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_languages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('VAR_NAME')->unique();
            $table->string('en_us');
            $table->string('pl_pl')->nullable();
        });

        $vaibles = array(
            [
                'VAR_NAME' => 'BTN_CREATE_CATEGORY',
                'en_us' => 'Create new category',
                'pl_pl' => 'Dodaj nową kategorię'
            ],
            [
                'VAR_NAME' => 'NO_DATA_MSG',
                'en_us' => 'No data',
                'pl_pl' => 'Brak danych'
            ],
            [
                'VAR_NAME' => 'BTN_SHOW',
                'en_us' => 'Show',
                'pl_pl' => 'Pokaż'
            ],
            [
                'VAR_NAME' => 'BTN_EDIT',
                'en_us' => 'Edit',
                'pl_pl' => 'Edytuj'
            ],
            [
                'VAR_NAME' => 'BTN_DELETE',
                'en_us' => 'Delete',
                'pl_pl' => 'Usuń'
            ],
            [
                'VAR_NAME' => 'BTN_GO_BACK',
                'en_us' => 'Go back',
                'pl_pl' => 'Wróć'
            ],
            [
                'VAR_NAME' => 'TEXT_DESCRIPTION',
                'en_us' => 'Description',
                'pl_pl' => 'Opis'
            ],
            [
                'VAR_NAME' => 'TEXT_NAME',
                'en_us' => 'Name',
                'pl_pl' => 'Nazwa'
            ]
        );
    
        foreach ($variables as $variable){
            $language_variable = new App\Http\Models\ContentLanguage();
            $language_variable->VAR_NAME =$variable['VAR_NAME'];
            $language_variable->en_us =$variable['en_us'];
            $language_variable->pl_pl =$variable['pl_pl'];
            $language_variable->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_languages');
    }
}
