package BehavioralPatterns.Iterator.java;

/* 
 * 本棚に入れる本のクラス
 */
public class Book {
  private String name;

  public Book(String name) {
    this.name = name;
  }

  public String getName() {
    return name;
  }
}