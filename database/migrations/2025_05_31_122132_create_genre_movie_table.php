public function up()
{
    Schema::create('genre_movie', function (Blueprint $table) {
        $table->id();
        $table->foreignId('genre_id')->constrained()->onDelete('cascade');
        $table->foreignId('movie_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}
