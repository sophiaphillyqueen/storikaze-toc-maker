
fildesnom="storikaze-toc-maker"

cd "$(dirname "${0}")" || exit
curdirec="$(pwd)"


rm -rf tmp
mkdir -p tmp
(
  echo "#! $(which perl)"
  echo "use strict;"
  echo "my \$resloc = \"${curdirec}\";"
  echo "# line 1 \"${curdirec}/outer-wrap.qpl-then\""
  cat outer-wrap.qpl
) > tmp/${fildesnom}
chmod 755 tmp/${fildesnom}
perl -c tmp/${fildesnom} || exit 2

destina="${HOME}/bin"
# Allow overriding of default:
if [ -f "ins-opt-code/dir-of-install.txt" ]; then
  destina="$(cat ins-opt-code/dir-of-install.txt)"
fi

cp "tmp/${fildesnom}" "${destina}/."
chmod 755 "${destina}/${fildesnom}"

