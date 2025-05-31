public function up()
{
    Schema::create('genres', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });
}
