function isNumber(val)
{
  var reg = /^[\d|\.|,]+$/;
  return reg.test(val);
}

function isInt(val)
{
  if (val == "")
  {
    return false;
  }
  var reg = /\D+/;
  return !reg.test(val);
}