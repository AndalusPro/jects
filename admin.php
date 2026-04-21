<?php
if (isset($_POST['save_changes'])) {
    // تجهيز البيانات الجديدة من الفورم
    $newData = [
        "hero_title" => $_POST['hero_title'],
        "phone_number" => $_POST['phone_number']
    ];
    
    // حفظها في ملف JSON
    file_put_contents('data.json', json_encode($newData, JSON_PRETTY_PRINT));
    echo "تم تحديث الموقع بنجاح!";
}
?>

<form method="POST">
    <input type="text" name="hero_title" value="<?php echo $data['hero_title']; ?>">
    <input type="text" name="phone_number" value="<?php echo $data['phone_number']; ?>">
    <button type="submit" name="save_changes">تحديث الموقع</button>
</form>
<?php
session_start();
// نظام حماية بسيط
$password = "Andalus2026"; 

if (isset($_POST['login'])) {
    if ($_POST['pass'] == $password) $_SESSION['admin'] = true;
}

if (!isset($_SESSION['admin'])) {
    exit('<form method="POST" style="text-align:center;margin-top:100px;">
            <input type="password" name="pass" placeholder="كلمة المرور">
            <button type="submit" name="login">دخول</button>
          </form>');
}

$dataFile = 'content.json';
$content = json_decode(file_get_contents($dataFile), true);

if (isset($_POST['save'])) {
    $content['hero_title'] = $_POST['hero_title'];
    $content['phone'] = $_POST['phone'];
    file_put_contents($dataFile, json_encode($content, JSON_PRETTY_PRINT));
    $msg = "تم التحديث بنجاح!";
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Andalus Admin | لوحة التحكم</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root { --brand-orange: #f37321; }
        body { background: #1a1a1a; color: white; font-family: sans-serif; }
    </style>
</head>
<body class="p-8">
    <div class="max-w-4xl mx-auto bg-[#242424] p-8 rounded-2xl border-t-4 border-[#f37321]">
        <h1 class="text-2xl font-bold mb-6 flex justify-between">
            <span>لوحة تحكم Andalus Projects</span>
            <a href="index.php" class="text-sm text-gray-400 underline">معاينة الموقع</a>
        </h1>

        <?php if(isset($msg)) echo "<div class='bg-green-600 p-3 rounded mb-4'>$msg</div>"; ?>

        <form method="POST" class="space-y-6">
            <div>
                <label class="block text-gray-400 mb-2">العنوان الرئيسي (Hero Title)</label>
                <input type="text" name="hero_title" value="<?php echo $content['hero_title']; ?>" 
                       class="w-full bg-black border border-gray-700 p-3 rounded focus:border-[#f37321] outline-none">
            </div>

            <div>
                <label class="block text-gray-400 mb-2">رقم الهاتف / واتساب</label>
                <input type="text" name="phone" value="<?php echo $content['phone']; ?>" 
                       class="w-full bg-black border border-gray-700 p-3 rounded focus:border-[#f37321] outline-none">
            </div>

            <hr class="border-gray-800">
            
            <button type="submit" name="save" 
                    class="bg-[#f37321] text-white px-8 py-3 rounded-lg font-bold hover:scale-105 transition">
                حفظ التغييرات
            </button>
        </form>
    </div>
</body>
</html>
