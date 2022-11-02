<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BooksApiTest extends TestCase{

  use RefreshDatabase;

  /** @test */
  function can_get_all_books(){
    $books = Book::factory(4)->create();
    $response = $this->getJson(route('books.index'));
    $response->assertJsonFragment([
      'title' => $books[0]->title,
    ]);
  }

  /** @test */
  function can_get_one_book(){
    $book = Book::factory()->create();
    $this->getJson(route('books.show', $book ));

  }

}
