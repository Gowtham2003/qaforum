<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 10 questions
      $questions = [
        [
          'title' => 'Is Java "pass-by-reference" or "pass-by-value"?',
          'content' => "I always thought Java uses pass-by-reference.
However, I've seen a blog post that claims that Java uses pass-by-value.
I don't think I understand the distinction they're making.
What is the explanation?",
          'markdown' => "I always thought Java uses pass-by-reference.
However, I've seen a blog post that claims that Java uses pass-by-value.
I don't think I understand the distinction they're making.
What is the explanation?",
          'user_id' => 1
        ],
        [
          'title' => 'How do i print output in straight line in java',
          'content' => '
          So i used for loop in my code and my output prints vertically but what i want is it to print horizontally for example

```java 
for (int i = 0; i < 10; i++ ) { System.out.println("i is " + (i+1) + " | "); }
```

for this the output is :

i is 1 | i is 2 | i is 3 | and so on...

But the output i want is :

i is 1 | i is 2 | i is 3 | ... and so on`

```java
for (int i = 0; i < 10; i++ ) {
      System.out.println("i is " + (i+1) + " | ");
}
```
for this the out put is :

i is 1 |
i is 2 |
i is 3 |
and so on... 

But the output i want is :

i is 1 | i is 2 | i is 3 | ... and so on`
javaloops
',
      'markdown' => '
        <p>So i used for loop in my code and my output prints vertically but what i want is it to print horizontally for example</p>
<pre><code class="language-java">for (int i = 0; i &lt; 10; i++ ) { System.out.println(&quot;i is &quot; + (i+1) + &quot; | &quot;); }
</code></pre>
<p>for this the output is :</p>
<p>i is 1 | i is 2 | i is 3 | and so on...</p>
<p>But the output i want is :</p>
<p>i is 1 | i is 2 | i is 3 | ... and so on`</p>
<pre><code class="language-java">for (int i = 0; i &lt; 10; i++ ) {
      System.out.println(&quot;i is &quot; + (i+1) + &quot; | &quot;);
}
</code></pre>
<p>for this the out put is :</p>
<p>i is 1 |
i is 2 |
i is 3 |
and so on...</p>
<p>But the output i want is :</p>
<p>i is 1 | i is 2 | i is 3 | ... and so on`
javaloops</p>

',
          'user_id' => 2
        ],
        [
          'title' => 'What does if __name__ == "__main__": do?',
          'content' => '
          What does this do, and why should one include the if statement?
```python
if __name__ == "__main__":
    print("Hello, World!")
```
',
'markdown' => '<p>What does this do, and why should one include the if statement?</p>
<pre><code class="language-python">if __name__ == &quot;__main__&quot;:
    print(&quot;Hello, World!&quot;)
</code></pre>
',
          'user_id' => 3
        ],
        [
          'title' => 'Does Python have a ternary conditional operator',
          'content' => 
          "Is there a ternary conditional operator in Python?",
          'markdown' => "<p>Is there a ternary conditional operator in Python?</p>
",
          'user_id' => 4
        ],
        [
          'title' => 'How do I merge two dictionaries in a single expression?',
          'content' => 
          "I want to merge two dictionaries into a new dictionary.
```python
x = {'a': 1, 'b': 2}
y = {'b': 3, 'c': 4}
z = merge(x, y)
```
```
>>> z
{'a': 1, 'b': 3, 'c': 4}
```

Whenever a key k is present in both dictionaries, only the value y[k] should be kept.",
          'markdown' => '<p>I want to merge two dictionaries into a new dictionary.</p>
<pre><code class="language-python">x = {\'a\': 1, \'b\': 2}
y = {\'b\': 3, \'c\': 4}
z = merge(x, y)
</code></pre>
<pre><code>&gt;&gt;&gt; z
{\'a\': 1, \'b\': 3, \'c\': 4}
</code></pre>
<p>Whenever a key k is present in both dictionaries, only the value y[k] should be kept.</p>
',
          'user_id' => 4
        ],
      ];
        foreach ($questions as $question) {
          Question::create($question);
        }
$comments = [
  [
  "question_id"=> 3,
  "user_id" => 1,
  "comment" => "It's boilerplate code that protects users from accidentally invoking the script when they didn't intend to. Here are some common problems when the guard is omitted from a script:\nIf you import the guardless script in another script (e.g. import my_script_without_a_name_eq_main_guard), then the latter script will trigger the former to run at import time and using the second script's command line arguments. This is almost always a mistake.\nIf you have a custom class in the guardless script and save it to a pickle file, then unpickling it in another script will trigger an import of the guardless script, with the same problems outlined in the previous bullet.",
  "votes" => 0,
  ],
  [
  "question_id"=> 3,
  "user_id" => 2,
  "comment" => "Let's look at the answer in a more abstract way:

Suppose we have this code in x.py:

...
<Block A>
if __name__ == '__main__':
    <Block B>
...
Blocks A and B are run when we are running x.py.

But just block A (and not B) is run when we are running another module, y.py for example, in which x.py is imported and the code is run from there (like when a function in x.py is called from y.py).",
  "votes" => 0,
  ],
  [
  "question_id"=> 1,
  "user_id" => 2,
  "comment" => 'As many people mentioned it before, Java is always pass-by-value\n
Here is another example that will help you understand the difference (the classic swap example):\n
public class Test {
  public static void main(String[] args) {
    Integer a = new Integer(2);
    Integer b = new Integer(3);
    System.out.println("Before: a = " + a + ", b = " + b);
    swap(a,b);
    System.out.println("After: a = " + a + ", b = " + b);
  }

  public static swap(Integer iA, Integer iB) {
    Integer tmp = iA;
    iA = iB;
    iB = tmp;
  }
}
Prints:\n
Before: a = 2, b = 3
After: a = 2, b = 3\n
This happens because iA and iB are new local reference variables that have the same value of the passed references (they point to a and b respectively). So, trying to change the references of iA or iB will only change in the local scope and not outside of this method.',
  "votes" => 0,
  ],
  [
  "question_id"=> 2,
  "user_id" => 1,
  "comment" => 'Change it to System.out.print as below:
\n
for (int i = 0; i < 10; i++ ) {
      System.out.print("i is " + (i+1) + " | ");
}
\n
That should do.',
  "votes" => 0,
  ],
];
foreach ($comments as $comment) {
  Comment::create($comment);
}
    }
}
