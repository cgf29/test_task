class Movie extends Model
{
    protected $fillable = ['title', 'is_published', 'poster'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
