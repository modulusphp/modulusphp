% // Modulus Code Block %

<@cmodulus
  string name = "{{ $name }}";

  func greet(name) {
    try {
      // echo string.Format("Hello {0}", name);
      echo string.Include("Hello {name}");
      println string.Include("Hello {name}");
    }
    catch ex {
      echo 'This is a error message!';
      error 'This is a error message!';
    }

    echo '<br>';

    if name == "Donald" {
      echo string.Format("{0} is the creator of C Modulus", name);
      println string.Format("{0} is the creator of C Modulus", name);
    }
    else {
      echo "I don't know who that is";
      error "I don't know who that is";
    }
  }

  greet(name);
@>