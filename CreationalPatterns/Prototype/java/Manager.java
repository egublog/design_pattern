package CreationalPatterns.Prototype.java;

import java.util.HashMap;
import java.util.Map;

/*
 * マネージャークラス
 */
public class Manager {
  private Map<String, Product> showcase = new HashMap<>();

  public void register(String name, Product product) {
    showcase.put(name, product);
  }

  public Product create(String prototypeName) {
    Product p = showcase.get(prototypeName);
    return p.createClone();
  }
}
