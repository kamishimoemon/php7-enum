# 🔥 php7-enum

[![php](https://img.shields.io/badge/PHP-7.4-4f5b93.svg)](http://php.net)
[![CI](https://github.com/kamishimoemon/php7-enum/actions/workflows/ci.yml/badge.svg)](https://github.com/kamishimoemon/php7-enum/actions/workflows/ci.yml)

**php7-enum** is a pure PHP 7.4 implementation of Java-style enums — supporting unique instances, custom methods, data binding, and extensibility — all without native enum support.

This library explores two implementation strategies:

- `EnumFlame`: an abstract base class.
- `EnumSpirit`: a reusable trait.

Both follow a common interface: `Enumeration`.

> Designed for legacy projects and low-level control without sacrificing elegance or object-oriented power.

---

## ✨ Features

✅ Unique instances  
✅ Strict finite set of values  
✅ Identity-safe comparisons  
✅ Custom data and methods  
✅ `values()` and `valueOf()` support  
✅ String casting  
✅ Optional per-instance behavior  
✅ Extendable enum definitions  
✅ Immutable by design  
✅ Identifiers like `Domain.Color.RED` 

---

## 🧱 Structure

```
src/
├── Enumeration.php      # Shared interface
├── EnumFlame.php        # Abstract base class implementation
├── EnumSpirit.php       # Trait-based implementation
examples/
tests/
README.md
```

---

## 🧪 Philosophy

This library prioritizes:

- **Clean architecture**: strict separation of responsibilities.
- **Object thinking**: enums are *objects*, not mere values.
- **Flexibility**: usable in any PHP 7.4+ project, with or without frameworks.
- **Clarity**: readable, self-contained, and extendable code.

---

## 🧪 Example

```php
final class Color extends EnumFlame implements Enumeration
{
    public static function RED(): self {
        return self::getInstance('RED');
    }

    public static function BLUE(): self {
        return self::getInstance('BLUE');
    }

    public function isWarm(): bool {
        return $this->name() === 'RED';
    }
}

$color = Color::RED();

echo $color;                     // "RED"
echo $color->id();               // "Color.RED"
echo $color->isWarm();           // true
```

---

## 📚 Tests

Coming soon. The library will include:

- ✅ Unit tests for all core behaviors
- 🔄 Reusable test contracts for both implementations
- ⚠️ Edge-case validation (invalid access, duplication, etc.)

---

## 💬 License

MIT – do what you want, but don't remove the fire. 🔥
