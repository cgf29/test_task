public function up()
{
    Schema::create('movies', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->boolean('is_published')->default(false);
        $table->string('poster')->nullable();
        $table->timestamps();
    });
}
